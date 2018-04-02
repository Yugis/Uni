 <template>
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Options</th>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Student Id</th>
                    <th>Attendance</th>
                    <th v-for="quiz in quizzes">
                        {{ quiz.quiz_name }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(student, index) in students_arr" v-if="!loading">
                    <td v-if="!editing || !currentStudent(student)">
                        <button class="btn btn-primary" @click="edit(student, index)" :disabled="editing == true">
                            Edit
                        </button>
                    </td>
                    <td v-if="editing && currentStudent(student)">
                        <button class="btn btn-primary" @click="update()">Update</button>
                        <a @click="cancelEdit(student)">
                            Cancel
                        </a>
                    </td>
                    <td>
                        {{ index }}
                    </td>
                    <td>
                        {{ student.full_name }}
                    </td>
                    <td>
                        {{ student.email }}
                    </td>
                    <td>
                        {{ student.secret_id.secret_id }}
                    </td>
                    <td v-if="!editing || !currentStudent(student)">
                        {{ student.pivot.attendance }}
                    </td>
                    <td v-if="editing && currentStudent(student)">
                        <input name="attendance" v-model="student.pivot.attendance" class="form-control">
                    </td>
                    <td v-for="quiz in student.quizzes" v-if="!editing || !currentStudent(student)">
                        {{ quiz.pivot.score }}
                    </td>
                    <td v-for="(quiz, index) in student.quizzes" v-if="editing && currentStudent(student)">
                        <input name="scores[]" v-model="quiz_scores[index].pivot.score" class="form-control">
                    </td>
                </tr>
            </tbody>
        </table>
        <center><div v-if="loading" class="spinner"></div></center>
    </div>
 </template>

<script>
    export default {
        props: ['quizzes', 'course'],
        data: function () {
            return {
                editing: false,
                editing_user: '',
                index: '',
                quiz_scores: [],
                new_quiz_score: [],
                course_slug: this.course.slug,
                students_arr: [],
                loading: false,
                attendance: ''
            };
        },
        mounted() {
            this.loading = true
            this.getStudents();
        },
        methods: {
            edit(student, index) {
                this.editing_user = student,
                this.attendance = this.editing_user.pivot.attendance,
                this.index = index,
                this.editing = true
                this.editing_user.quizzes.forEach( q => {
                    this.quiz_scores.push(q)
                })
            },
            cancelEdit(student) {
                this.loading = true,
                this.getStudents(),
                this.attendance = ''
                this.editing_user = '',
                this.index = '',
                this.quiz_scores = [],
                this.editing = false
            },
            update() {
                this.quiz_scores.forEach( score => {
                    this.new_quiz_score.push(score)
                })
                this.attendance = this.editing_user.pivot.attendance,

                this.$http.post('/manager/courses/'+ this.course_slug, { 
                    quizzes: this.new_quiz_score, 
                    student: this.editing_user, 
                    attendance: this.attendance 
                })
                .then( (resp) => {
                    console.log(resp);
                })

                this.editing_user = '',
                this.index = '',
                this.quiz_scores = [],
                this.new_quiz_score = [],
                this.attendance = '',
                this.editing = false  
            },
            getStudents() {
                this.students_arr = []

                this.$http.get('/api/get_course_students/' + this.course_slug)
                .then( (resp) => {
                    resp.body.forEach( (s) => {
                        this.students_arr.push(s)
                        this.loading = false
                    })
                })

            },
            currentStudent(student) {
                return this.editing_user == student
            }
        },
        watch: {
            
        }

    }
</script>