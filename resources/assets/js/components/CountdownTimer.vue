<template>
    <div>
        <div v-if="finished" v-text="expiredText"></div>

        <div v-else>
            <span>{{ remaining.minutes }} Minutes, </span>
            <span>{{ remaining.seconds }} Seconds</span>
            left...
        </div>
    </div>
</template>

<script>
    import moment from 'moment';
    export default {
        props: {
            until: { default: 600000},
            expiredText: { default: 'TIME IS UP' },
        },
        data () {
            return {
                limiter: this.until * 100000
            };
        },
        created () {
            this.refreshEverySecond();
            window.addEventListener('beforeunload', this.showModal);
            window.onbeforeunload = function() {
                return "Do you really want to leave our brilliant application?";
            }
            $(document).on("submit", "form", function(event){
                    window.onbeforeunload = null;
            });

        },
        computed: {
            finished () {
                return this.remaining.total <= 0;
            },
            remaining () {
                let remaining = moment.duration(this.limiter);
                if (remaining <= 0) this.$emit('finished');
                return {
                    total: remaining,
                    minutes: remaining.minutes(),
                    seconds: remaining.seconds()
                };
            },
        },
        methods: {
            refreshEverySecond () {
                let interval = setInterval(() => this.limiter = this.limiter - 1000, 1000);
                this.$on('finished', () => clearInterval(interval));
                this.$on('finished', () => this.timeUp());
            },

            timeUp() {
                const form = document.querySelector('[data-form-submit]');
                const radios = document.querySelectorAll('input[type=radio]');
                radios.forEach(radio => radio.style.display = 'none');
                window.onbeforeunload = null;
                form.submit();
            },
            showModal() {
                const modalOverlay = document.querySelector('.examModal-overlay');
                const examModal = document.querySelector('.examModal');
                const modalContent = document.querySelector('.examModal-content');
                modalOverlay.classList.add('active');
                examModal.classList.add('active');
                modalContent.classList.add('active');
                const closeModal = document.querySelector('.close-examModal');
                closeModal.addEventListener('click', this.hideModal);
            },
            hideModal() {
                const modalOverlay = document.querySelector('.examModal-overlay');
                const examModal = document.querySelector('.examModal');
                const modalContent = document.querySelector('.examModal-content');
                modalOverlay.classList.remove('active');
                examModal.classList.remove('active');
                modalContent.classList.remove('active');
            }
        }
    }
</script>
