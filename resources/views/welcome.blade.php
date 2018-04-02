<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>A-Y-Academy | Welcome</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">

        <!-- Temporary Custom -->
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <!-- -->
        <!-- Styles -->
        <style>
            html, body {
                /*background: linear-gradient(to top, #33ccff 0%, #ff99cc 100%);*/
                /*background: linear-gradient(to bottom, #200122, #6f0000);*/
                background: #ccc;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                margin: 0;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .title {
                /*color: linear-gradient(to top, #FF0080, #FF8C00, #40E0D0);*/
                /*background: linear-gradient(to top, #FF0080, #FF8C00, #40E0D0);*/
            }

            .title h1 {
                font-size: 80px;
                font-family: Arial;
                line-height: 1.5;
                background: linear-gradient(to top, #ada996, #f2f2f2, #dbdbdb, #eaeaea); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            	-webkit-background-clip: text;
            	-webkit-text-fill-color: transparent;
                text-shadow: -5px -5px 0px rgba(124,255,255, 0.3);
            }

            /*New Styles*/
            nav {
                height: 30px;
                background: firebrick;
                width: 100%;
                position: absolute;
                z-index: 1;
            }

            nav a{
                float: right;
                padding: 7px 15px 0 0;
                color: #fff;
                font-size: 14px;
                font-family: sans-serif;
                text-decoration: none;
            }

            header {
                background: darkred;
                min-height: 70px;
                position: absolute;
                width: 100%;
                top: 30px;
                z-index: 1;
                border-bottom: #fff 1px solid;
            }

            header .container {
                text-transform: uppercase;
            }

            header li {
                float: left;
                display: inline;
                padding: 10px 10px 0 10px;
            }

            header a:hover {
                color: #ffc600;
                transition: all 0.5s linear;
            }

            header a{
                text-decoration: none;
                font-family: Helvetica;
                font-size: 16px;
                color: #fff
            }

            #container {
                align-items: center;
                display: flex;
                justify-content: center;
                border-bottom: #fff 1px solid;
            }

            #branding {
                color: white;
                font-family: Arial;
                text-align: center;
            }

            #branding h1 {
                font-family: serif;
            }

            .nav {
                color: white;
                margin-top: 10px;
                display: flex;
                justify-content: center;
                text-transform: uppercase;
            }

            .nav ul {
                padding: 0;
            }

            #showcase {
                /*min-height: 400px;*/
                height: 100vh;
                background: url(/storage/defaults/welcome1.jpeg) no-repeat 0 -200px;
                text-align: center;
                width: 100%;
                background-attachment: fixed;
            }

            #showcase:before {
                position: absolute;
                content: "";
                width: 100%;
                height: 100%;
                background: rgba(102, 51, 0, 0.6);
                left: 0;
            }

            .content-wrapper {
                width: 60%;
                margin: auto;
                overflow: hidden;
                position: relative;
                top: 25%;
            }

            #subTitle h2 {
                color: #fff;
                font-family: monospace;
                font-style: italic;
                font-weight: lighter;
                font-size: 2.5em;
            }

            .quote {
                height: 85vh;
                background: #1f2223;
                display: flex;
                align-items: center;
            }

            .quote div {
                width: 50%;
                height: 60%;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .quote h2 {
                color: white;
                box-shadow: -3px 12px 20px 0px black;
                padding: 8px;
                width: 70%;
                height: 100%;
                text-align: center;
                display: flex;
                align-items: center;
                font-family: sans-serif;
                background: darkred;
                text-shadow: -2px 11px 20px rgba(0,0,0,0.4);
                border-radius: 10px;
            }

            .quote img {
                height: 100%;
                box-shadow: -14px 16px 20px black;
                padding: 5px;
                background: lightgrey;
                border-radius: 10px;
            }

            .footer {
                background: #1f2223;
                display: flex;
                padding: 0 75px;
            }

            .contact {
                width: 50%;
            }

            #headlines {
                color: #00ccff;
                font-size: 16px;
            }

            #info {
                color: #fff;
                font-size: 16px;
                font-family: cursive;
            }

            #info.override {
                color: firebrick;
            }

            #info.override a {
                text-decoration: none;
                color: firebrick;
            }

            .map {
                width: 50%;
            }

            .mapper {
                height: 80%;
                width: 100%;
                border: 1px #fff solid;
            }

            .copyright {
                background: #444;
                color: #fff;
                padding: 20px 50px;
                text-align: center;
                border-bottom: 1px whitesmoke solid;
            }

            .copyright h4 {
                margin: 0;
            }

            .header h2 {
                font-size: 20px;
                color: #fff;
                text-transform: uppercase;
                text-shadow: 5px 11px 20px black;
            }

            /** {
                outline: solid 1px red !important;
            }*/


            @media(max-width: 999px) {

                .content-wrapper {
                    top: 35%;
                }
                .title h1{
                    font-size: 60px;
                    /*width: 50%;*/
                    margin: auto;
                }
                #subTitle h2 {
                    font-size: 2em;
                    margin: auto;
                }
            }

            @media(max-height: 550px) {
                .content-wrapper {
                    width: 100%;
                }
            }

            /* custom added */

            #return-to-top {
                position: fixed;
                bottom: 20px;
                right: 20px;
                background: rgb(0, 0, 0);
                background: rgba(0, 0, 0, 0.7);
                width: 50px;
                height: 50px;
                display: block;
                text-decoration: none;
                -webkit-border-radius: 35px;
                -moz-border-radius: 35px;
                border-radius: 35px;
                display: none;
                -webkit-transition: all 0.3s linear;
                -moz-transition: all 0.3s ease;
                -ms-transition: all 0.3s ease;
                -o-transition: all 0.3s ease;
                transition: all 0.3s ease;
            }
            #return-to-top i {
                color: #fff;
                margin: 0;
                position: relative;
                top: 15px;
                font-size: 19px;
                -webkit-transition: all 0.3s ease;
                -moz-transition: all 0.3s ease;
                -ms-transition: all 0.3s ease;
                -o-transition: all 0.3s ease;
                transition: all 0.3s ease;
            }
            #return-to-top:hover {
                background: rgba(0, 0, 0, 0.9);
            }
            #return-to-top:hover i {
                color: #fff;
                top: 5px;
            }

            :root {
                --container-bg-color: #333;
                --left-bg-color: rgba(191, 255, 0, 0.3);
                --left-button-hover-color: rgb(255, 153, 51, 0.5);
                --right-bg-color: rgb(102, 102, 255, 0.6);
                --right-button-hover-color: rgb(153, 153, 255, 0.5);
                --hover-width: 75%;
                --other-width: 25%;
                --speed: 1000ms;
            }

            .splitcontainer h1 {
                font-size: 4rem;
                color: white;
                position: absolute;
                left: 50%;
                top: 20%;
                transform: translateX(-50%);
                white-space: nowrap;
                text-shadow: 8px 5px 7px black;
            }

            .splitcontainer #paragraph {
                font-size: 1.25rem;
                position: absolute;
                left: 50%;
                top: 37%;
                transform: translateX(-50%);
                font-style: italic;
                font-weight: 700;
                text-shadow: 5px 5px 50px #fff;
                width: 300px;
                color: floralwhite;
                text-shadow: 5px 5px 5px rgba(0,0,0,1);
                top: 40%;
            }

            .button {
                display: block;
                position: absolute;
                left: 50%;
                top: 40%;
                height: 2.5rem;
                padding-top: 1.3rem;
                top: 70%;
                width: 15rem;
                text-align: center;
                color: white;
                border: white solid 0.2rem;
                font-size: 1rem;
                font-weight: bold;
                text-transform: uppercase;
                text-decoration: none;
                transform: translateX(-50%);
            }

            .split.left .button:hover {
                background-color: var(--left-button-hover-color);
                border-color: var(--left-button-hover-color);
            }

            .split.right .button:hover {
                background-color: var(--right-button-hover-color);
                border-color: var(--right-button-hover-color);
            }

            .splitcontainer {
                width: 100%;
                height: 100vh;
                background: var(--container-bg-color);
                margin: 5rem 0px;
            }

            .split {
                position: absolute;
                width: 50%;
                height: 100%;
                overflow: hidden;
            }

            .split.left {
                left: 0;
                background: url(/storage/defaults/engineer.jpeg) center center no-repeat;
                background-size: cover;
            }

            .split.left:before {
                position: absolute;
                content: "";
                width: 100%;
                height: 100%;
                background: var(--left-bg-color);
            }

            .split.right {
                right: 0;
                background: url(/storage/defaults/programmer.jpeg) center center no-repeat;
                background-size: cover;
            }

            .split.right:before {
                position: absolute;
                content: "";
                width: 100%;
                height: 100%;
                background: var(--right-bg-color);
            }

            .split.left, .split.right, .split.right:before, .split.left:before{
                transition: var(--speed) all ease-in-out;
            }

            .hover-left .left {
                width: var(--hover-width);
            }

            .hover-left .right {
                width: var(--other-width);
            }

            .hover-left .right:before {
                z-index: 2;
            }

            .hover-right .right {
                width: var(--hover-width);
            }

            .hover-right .left {
                width: var(--other-width);
            }

            .hover-right .left:before {
                z-index: 2;
            }

            @media(max-width: 800px) {
                /*h1 {
                    font-size: 2rem;
                }
                .button {
                    width: 12rem;
                }*/
            }

            @media(max-height: 600px) {
                /*.button {
                    top: 60%;
                }*/
            }

            /* Custom Menu */
            .cf:before,
                .cf:after {
                  content: " ";
                  display: table;
                }

                .cf:after {
                  /*clear: both;*/
                }

                .cf {
                  *zoom: 1;
                }

                /* Mini reset, no margins, paddings or bullets */
                .menu,
                .submenu {
                  margin: 0;
                  padding: 0;
                  list-style: none;
                }

                /* Main level */
                .menu {
                  width: 800px;
                  /* http://www.red-team-design.com/horizontal-centering-using-css-fit-content-value */
                  width: -moz-fit-content;
                  width: -webkit-fit-content;
                  width: fit-content;
                }

                .menu > li {
                  line-height: 1.5;
                  float: left;
                  position: relative;
                  transform: skewX(25deg);
                }

                .menu a {
                  display: block;
                  color: #fff;
                  text-transform: uppercase;
                  text-decoration: none;
                  font-family: Arial, Helvetica;
                  font-size: 14px;
                }

                .menu li:hover {
                  background: firebrick;
                }

                .menu > li > a {
                  transform: skewX(-25deg);
                  padding: 1em 2em;
                }

                /* Dropdown */
                .submenu {
                  position: absolute;
                  width: 200px;
                  left: 50%; margin-left: -100px;
                  transform: skewX(-25deg);
                  transform-origin: left top;
                }

                .submenu li {
                  background-color: darkred;
                  position: relative;
                  overflow: hidden;
                }

                .submenu li:hover {
                    opacity: 1;
                }
                .submenu > li > a {
                  padding: 1em 2em;
                }

                .submenu > li::after {
                  content: '';
                  position: absolute;
                  top: -125%;
                  height: 100%;
                  width: 100%;
                  box-shadow: 0 0 50px rgba(0, 0, 0, .9);
                }

                /* Odd stuff */
                .submenu > li:nth-child(odd){
                  transform: skewX(-25deg) translateX(0);
                }

                .submenu > li:nth-child(odd) > a {
                  transform: skewX(25deg);
                }

                .submenu > li:nth-child(odd)::after {
                  right: -50%;
                  transform: skewX(-25deg) rotate(3deg);
                }

                /* Even stuff */
                .submenu > li:nth-child(even){
                  transform: skewX(25deg) translateX(0);
                }

                .submenu > li:nth-child(even) > a {
                  transform: skewX(-25deg);
                }

                .submenu > li:nth-child(even)::after {
                  left: -50%;
                  transform: skewX(25deg) rotate(3deg);
                }

                /* Show dropdown */
                .submenu,
                .submenu li {
                  opacity: 0;
                  visibility: hidden;
                }

                .submenu li {
                  transition: .2s ease transform;
                }

                .menu > li:hover .submenu,
                .menu > li:hover .submenu li {
                  opacity: 1;
                  visibility: visible;
                }

                .menu > li:hover .submenu li:nth-child(even){
                  transform: skewX(25deg) translateX(15px);
                }

                .menu > li:hover .submenu li:nth-child(odd){
                  transform: skewX(-25deg) translateX(-15px);
                }

                /**
                 * Overlay
                 * -- only show for tablet and up
                 */
                @media only screen and (min-width: 40em) {
                  .modal-overlay {
                    display: -webkit-box;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-box-align: center;
                        -ms-flex-align: center;
                            align-items: center;
                    -webkit-box-pack: center;
                        -ms-flex-pack: center;
                            justify-content: center;
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    z-index: 5;
                    background-color: rgba(0, 0, 0, 0.6);
                    opacity: 0;
                    visibility: hidden;
                    -webkit-backface-visibility: hidden;
                            backface-visibility: hidden;
                    -webkit-transition: opacity 0.6s cubic-bezier(0.55, 0, 0.1, 1), visibility 0.6s cubic-bezier(0.55, 0, 0.1, 1);
                    transition: opacity 0.6s cubic-bezier(0.55, 0, 0.1, 1), visibility 0.6s cubic-bezier(0.55, 0, 0.1, 1);
                  }
                  .modal-overlay.active {
                    opacity: 1;
                    visibility: visible;
                  }
                }
                /**
                 * Modal
                 */
                .modal {
                  display: -webkit-box;
                  display: -ms-flexbox;
                  display: flex;
                  -webkit-box-align: center;
                      -ms-flex-align: center;
                          align-items: center;
                  -webkit-box-pack: center;
                      -ms-flex-pack: center;
                          justify-content: center;
                  position: relative;
                  margin: 0 auto;
                  background-color: #fff;
                  width: 600px;
                  max-width: 75rem;
                  min-height: 20rem;
                  padding: 1rem;
                  border-radius: 3px;
                  opacity: 0;
                  overflow-y: auto;
                  visibility: hidden;
                  -webkit-box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                          box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                  -webkit-backface-visibility: hidden;
                          backface-visibility: hidden;
                  -webkit-transform: scale(1.2);
                          transform: scale(1.2);
                  -webkit-transition: all 0.6s cubic-bezier(0.55, 0, 0.1, 1);
                  transition: all 0.6s cubic-bezier(0.55, 0, 0.1, 1);
                }
                .modal .close-modal {
                  position: absolute;
                  cursor: pointer;
                  top: 5px;
                  right: 15px;
                  opacity: 0;
                  -webkit-backface-visibility: hidden;
                          backface-visibility: hidden;
                  -webkit-transition: opacity 0.6s cubic-bezier(0.55, 0, 0.1, 1), -webkit-transform 0.6s cubic-bezier(0.55, 0, 0.1, 1);
                  transition: opacity 0.6s cubic-bezier(0.55, 0, 0.1, 1), -webkit-transform 0.6s cubic-bezier(0.55, 0, 0.1, 1);
                  transition: opacity 0.6s cubic-bezier(0.55, 0, 0.1, 1), transform 0.6s cubic-bezier(0.55, 0, 0.1, 1);
                  transition: opacity 0.6s cubic-bezier(0.55, 0, 0.1, 1), transform 0.6s cubic-bezier(0.55, 0, 0.1, 1), -webkit-transform 0.6s cubic-bezier(0.55, 0, 0.1, 1);
                  -webkit-transition-delay: 0.3s;
                          transition-delay: 0.3s;
                }
                .modal .close-modal svg {
                  width: 1.75em;
                  height: 1.75em;
                }
                .modal .modal-content {
                  opacity: 0;
                  -webkit-backface-visibility: hidden;
                          backface-visibility: hidden;
                  -webkit-transition: opacity 0.6s cubic-bezier(0.55, 0, 0.1, 1);
                  transition: opacity 0.6s cubic-bezier(0.55, 0, 0.1, 1);
                  -webkit-transition-delay: 0.3s;
                          transition-delay: 0.3s;
                }
                .modal.active {
                  visibility: visible;
                  opacity: 1;
                  -webkit-transform: scale(1);
                          transform: scale(1);
                }
                .modal.active .modal-content {
                  opacity: 1;
                }
                .modal.active .close-modal {
                  -webkit-transform: translateY(10px);
                          transform: translateY(10px);
                  opacity: 1;
                }

                /**
                 * Mobile styling
                 */
                @media only screen and (max-width: 39.9375em) {
                  h1 {
                    font-size: 1.5rem;
                  }

                  .modal {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    -webkit-overflow-scrolling: touch;
                    border-radius: 0;
                    -webkit-transform: scale(1.1);
                            transform: scale(1.1);
                    padding: 0 !important;
                  }

                  .close-modal {
                    right: 20px !important;
                  }
                }

                label {
                    color: #000;
                    font-size: 20px;
                    font-weight: 700;
                }

                input[name="secretCode"] {
                    border-radius: 50px;
                    border: 1px firebrick solid;
                    height: 40px;
                    font-size: 40px;
                    margin: 10px;
                    text-align: center;
                }

                input[name="secretCode"]:focus {
                    outline: 0;
                    box-shadow: 0px 1px 20px 1px firebrick;
                    transition: all 0.3s;
                }

                .has-error {
                    height: 50%;
                    color: red;
                    margin: 5px;
                    border: 1px solid red;
                    border-radius: 15px;
                    transition: all 0.3s;
                    box-shadow: 0px 2px 20px 0px firebrick;
                    visibility: hidden;
                }

                .has-error p {
                    text-align: center;
                    font-size: 14pt;
                    font-weight: 700;
                    padding: 10px 10px;
                    margin: 0;
                    font-family: monospace;
                }

                #formInput {
                    display: flex;
                    align-items: center;
                    flex-direction: column;
                }

                .formSubmitButton {
                    border-radius: 10px;
                    font-size: 20px;
                    background: #fff;
                    color: springgreen;
                    border: none;
                    padding: 5px 10px;
                    cursor: pointer;
                    transition: all 0.3s;
                }

                .formSubmitButton:hover {
                    background: springgreen;
                    color: #fff;
                }

                .formSubmitButton:focus {
                    outline: 0;
                }

                /* Spli Screen Slider */

                #wrapper{
                  position: relative;
                  width:100%;
                  min-height:55vw;
                  overflow: hidden;
                  margin-bottom: 5rem;
                }

                .layer{
                  position: absolute;
                  width:100vw;
                  min-height: 55vw;
                  overflow: hidden;
                }

                .layer .content-wrap{
                  position: absolute;
                  width:100vw;
                  min-height: 55vw;
                }

                .layer .content-body{
                  width:25%;
                  position:absolute;
                  top:50%;
                  text-align: center;
                  transform:translateY(-50%);
                  color:#fff;
                }

                .layer img{
                  position: absolute;
                  top:50%;;
                  transform:translate(-50%, -50%);
                }


                .layer img#image1 {
                    width: 45%;
                    left: 55%;
                    padding: 5px;
                    background: #000;
                    box-shadow: 0 0 20px 7px rgba(0, 0, 0, 0.75);
                }

                .layer img#image2 {
                    width: 40%;
                    left: 48%;
                    height: 85%;
                    padding: 5px;
                    background: #333;
                    box-shadow: -2px 0px 20px 9px rgba(255,255,255,0.3);
                }

                .layer.top p {
                    font-size: 12pt;
                    color: rgba(0,0,0,0.7);
                    font-weight: 700;
                    font-style: italic;
                    text-shadow: 0px -3px 20px rgba(0,0,0,0.2);
                }

                .layer.bottom p {
                    font-size: 12pt;
                    color: rgba(255,255,255,0.7);
                    font-weight: 600;
                    font-style: italic;
                    text-shadow: 0px 4px 9px rgba(255,255,255,0.5);
                }

                .layer.top .sliderButton {
                    display: block;
                    position: absolute;
                    left: 82%;
                    height: 2.2rem;
                    padding-top: 1.3rem;
                    top: 47%;
                    width: 12rem;
                    text-align: center;
                    color: #000;
                    border: #000 solid 0.2rem;
                    font-size: 1rem;
                    font-weight: bold;
                    text-transform: uppercase;
                    text-decoration: none;
                    box-shadow: -1px 1px 13px 3px rgba(0,0,0,0.7);
                    transition: all 0.3s;
                }

                .layer.top .sliderButton:hover {
                    color: #fff;
                    box-shadow: -1px 1px 20px 7px rgba(0,0,0,1);
                    background: black;
                    transition: all 0.3s;
                }

                .layer.bottom .sliderButton {
                    display: block;
                    position: absolute;
                    left: 3%;
                    height: 2.5rem;
                    padding-top: 1.3rem;
                    top: 50%;
                    width: 15rem;
                    text-align: center;
                    color: #FDAB00;
                    border: #FDAB00 solid 0.2rem;
                    font-size: 1rem;
                    font-weight: bold;
                    text-transform: uppercase;
                    text-decoration: none;
                    box-shadow: -2px 1px 20px 7px rgba(255,255,255,0.7);
                    transition: all 0.3s;
                }

                .layer.bottom .sliderButton:hover {
                    color: #fff;
                    box-shadow: 0px 0px 18px 12px #FDAB00;
                    border: 0.2rem solid black;
                    transition: all 0.3s;
                }

                .layer h1{
                  font-size:2em;
                }

                .bottom{
                  background:#222;
                  /*z-index:1;*/
                }

                .bottom .content-body{
                  right:5%;
                }

                .bottom h1{
                  color:#FDAB00;
                  text-shadow: -2px -1px 20px rgba(255,255,255,0.5);
                }

                .top h1 {
                    text-shadow: 3px 9px 20px rgba(0,0,0,0.5);
                }

                .top{
                  background:#eee;
                  color:#222;
                  /*z-index:2;*/
                  width:50vw;
                }

                .top .content-body{
                  left: 5%;
                  color:#222;
                }

                .handle{
                  position: absolute;
                  height: 100%;
                  display: block;
                  background-color: #FDAB00;
                  width:5px;
                  top:0;
                  left: 50%;
                  z-index:3;
                }

                .skewed .handle{
                  top:50%;
                  transform:rotate(30deg) translateY(-50%);
                  height: 200%;
                  transform-origin:top;
                }

                .skewed .top{
                  transform: skew(-30deg);
                  margin-left:-1000px;
                  width: calc(50vw + 1000px);
                }

                .skewed .top .content-wrap{
                  transform: skew(30deg);
                  margin-left:1000px;
                }

                @media(max-width:768px){
                  body{
                    font-size:75%;
                  }
                }

        </style>
    </head>
    <body>
        <nav>
            @if (Auth::guard('instructor')->check())
                <a href="{{ url('/instructor') }}">Dashboard</a>
            @elseif (Auth::guard('admin')->check())
                <a href="{{ url('/manager') }}">Dashboard</a>
            @elseif (Auth::guard('web')->check())
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="#" id="signInButton">Sign In</a>
            @endif
        </nav>

        <header>
            <div class="container">
                <div id="branding">
                    <a href="#"><h1>Akhbar El Yom Academy</h1></a>
                </div>
                <div class="nav">
                    <ul class="menu cf">
                      <li>
                          <a href="">Home</a>
                          <ul class="submenu">
                            <li><a href="">Introducing The Acadmey</a></li>
                            <li><a href="">International Academy Links</a></li>
                            <li><a href="">Admission System In The Academy</a></li>
                            <li><a href="">Student Facility</a></li>
                            <li><a href="">Library Of The Academy</a></li>
                            <li><a href="">The Student's Union</a></li>
                          </ul>
                      </li>
                      <li><a href="">Training Center</a></li>
                      <li>
                        <a href="">Departments</a>
                        <ul class="submenu">
                          <li><a href="">Journalism Department</a></li>
                          <li><a href="">Business Administration Department</a></li>
                          <li><a href="">Mechanical Engineering Department</a></li>
                          <li><a href="">Computer Science &amp; Information Techology Department</a></li>
                          <li><a href="">Electrical Engingeering Department</a></li>
                        </ul>
                      </li>
                      <li>
                        <a href="">Academy Teaching Staff</a>
                        <ul class="submenu">
                          <li><a href="">Journalism</a></li>
                          <li><a href="">Business Administration</a></li>
                          <li><a href="">Computer Science</a></li>
                          <li><a href="">Mechanical Engineering</a></li>
                          <li><a href="">Electrical Engingeering</a></li>
                        </ul>
                      </li>
                      <li><a href="">The Dean's Word</a></li>
                    </ul>
                </div>
            </div>
      </header>


        <div id="container">
            <div id="showcase">
                <div class="content-wrapper animated fadeInUp">
                    <div class="title">
                        <h1>Akhbar El Yom Academy</h1>
                    </div>

                    <div id="subTitle">
                        <h2>"Innovation &amp; Excellency"</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="quote">
            <div><img src="/storage/defaults/main.jpeg" alt="Some Image"></div>
            <div><h2>&ldquo;The function of education is to teach one to think intensively and to think critically. Intelligence plus character - that is the goal of true education."  ~Martin Luther King, Jr.&rdquo;</h2></div>
        </div>

        <div class="splitcontainer">
          <div class="split left">
            <h1>The Engineer</h1>
            <div id="paragraph">
                <p>"Scientists investigate that which already is; Engineers create that which never been."</p>
            </div>
            <a href="#" class="button">Read More</a>
          </div>
          <div class="split right">
            <h1>The Programmer</h1>
            <div id="paragraph">
                <p>"Whether you want to uncover the secrets of the universe, or you want to pursue a career in the 21st century, basic computer programming is an essential skill to learn."</p>
            </div>
            <a href="#" class="button">Read More</a>
          </div>
        </div>

    <section id="wrapper" class="skewed">
        <div class="layer bottom">
          <div class="content-wrap">
            <div class="content-body">
              <h1>The Journalist</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut quisquam temporibus dolore vero reiciendis atque debitis. Sequi at consequatur deserunt?</p>
            </div>
            <img id="image2" src="/storage/defaults/journalism.jpeg" alt="">
            <a href="#" class="sliderButton">Read More</a>
          </div>
        </div>

        <div class="layer top">
            <div class="content-wrap">
              <div class="content-body">
                <h1>The Business Person</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut quisquam temporibus dolore vero reiciendis atque debitis. Sequi at consequatur deserunt?</p>
              </div>
              <img id="image1" src="/storage/defaults/business.jpeg" alt="">
              <a href="#" class="sliderButton">Read More</a>
            </div>
      </div>
      <div class="handle"></div>
    </section>


        <div class="modal-overlay">
          <div class="modal">

            <a class="close-modal">
              <svg viewBox="0 0 20 20">
                <path fill="#000000" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z"></path>
              </svg>
            </a><!-- close modal -->

            <div class="modal-content">
              <form method="POST">
                  {{ csrf_field() }}
                  <div id="formInput">
                      <label for="secretCode">Please Enter Your Secret Code Below:</label>

                      <div>
                          <input id="secretCode" maxlength="10" type="password" name="secretCode" value="{{ old('secretCode') }}" required autofocus>
                      </div>

                      <input type="submit" class="formSubmitButton" value="Submit">

                      <div class="has-error">

                      </div>
                  </div>

              </form>
            </div><!-- content -->

          </div><!-- modal -->
        </div><!-- overlay -->

        <footer>
            <section class="footer">
                <div class="contact">
                    <div class="header">
                        <h2>Contact Us</h2>
                    </div>

                    <div class="content">
                        <p id="headlines">
                            <strong>Address</strong>
                        </p>
                        <p id="info">
                            Industrial Fourth Area – 6th of October.
                        </p>
                        <p id="headlines">
                            <strong>Phone</strong>
                        </p>
                        <p id="info">
                            19283 , +202 38347120/21, +202 26300013
                        </p>
                        <p id="headlines">
                            <strong>Mail</strong>
                        </p>
                        <p id="info" class="override">
                            Info@akhbaracademy.edu.eg
                        </p>
                        <p id="headlines">
                            <strong>Website</strong>
                        </p>
                        <p id="info" class="override">
                            <a href="#">http://www.akhbaracademy.edu.eg</a>
                        </p>
                    </div>
                </div>

                <div class="map">
                    <div class="header">
                        <h2>Map</h2>
                    </div>

                    <div class="mapper">

                    </div>
                </div>
            </section>
            <section class="copyright">
                <h4>
                    Akhbar El Yom | Copyright © 2017 AYA , All rights reserved.
                </h4>

                <a href="javascript:" id="return-to-top"><i class="icon-chevron-up"></i></a>
            </section>
        </footer>

        <script src="{{ elixir('js/app.js') }}"></script>
        <script>
            const sigInButton = document.querySelector('#signInButton');
            signInButton.addEventListener('click', showModal);

            const closeModal = document.querySelector('.close-modal');
            closeModal.addEventListener('click', hideModal);

            function showModal() {
                const modalOverlay = document.querySelector('.modal-overlay');
                const modal = document.querySelector('.modal');
                const modalContent = document.querySelector('.modal-content');
                modalOverlay.classList.add('active');
                modal.classList.add('active');
                modalContent.classList.add('active');
            }


            function hideModal() {
                const modalOverlay = document.querySelector('.modal-overlay');
                const modal = document.querySelector('.modal');
                const modalContent = document.querySelector('.modal-content');
                modalOverlay.classList.remove('active');
                modal.classList.remove('active');
                modalContent.classList.remove('active');
            }





            const left = document.querySelector('.left');
            const right = document.querySelector('.right');
            const container = document.querySelector('.splitcontainer');

            left.addEventListener('mouseenter', () => {
                container.classList.add('hover-left');
            });

            left.addEventListener('mouseleave', () => {
                container.classList.remove('hover-left');
            });

            right.addEventListener('mouseenter', () => {
                container.classList.add('hover-right');
                // left.querySelector('p').style.display = "none";
            });

            right.addEventListener('mouseleave', () => {
                container.classList.remove('hover-right');
                // left.querySelector('p').style.display = "block";
            });

            // Temp
            $(window).scroll(function() {
                if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
                    $('#return-to-top').fadeIn(200);    // Fade in the arrow
                } else {
                    $('#return-to-top').fadeOut(200);   // Else fade out the arrow
                }
            });
            $('#return-to-top').click(function() {      // When arrow is clicked
                $('body,html').animate({
                    scrollTop : 0                       // Scroll to top of body
                }, 500);
            });
            // Temp End

            // Another Temp

            document.addEventListener('DOMContentLoaded', function(){
              let wrapper = document.getElementById('wrapper');
              let topLayer = wrapper.querySelector('.top');
              let handle = wrapper.querySelector('.handle');
              let skew = 0;
              let delta = 0;

              if(wrapper.className.indexOf('skewed') != -1){
                skew = 1000;
              }

              wrapper.addEventListener('mousemove', function(e){
                delta = (e.clientX - window.innerWidth / 2) * 0.5;

                handle.style.left = e.clientX + delta + 'px';

                topLayer.style.width= e.clientX + skew + delta + 'px';
              });
            });

            /* Customization */

            const form = document.querySelector('form[method="POST"]');
            const input = document.querySelector('#secretCode');
            const error = document.querySelector('.has-error');
            const button = document.querySelector('.formSubmitButton');

            form.addEventListener('submit', () => {
                input.style.boxShadow = "0px 1px 20px 1px springgreen";
            });

            input.addEventListener('input', () => {
                if(input.value.length > 3) {
                    error.style.visibility = 'visible';
                    error.innerHTML = `<p>Invalid secret code.</p>`;
                    button.disabled = true;
                } else {
                    error.style.visibility = 'hidden';
                    error.innerHTML = ``;
                    button.disabled = false;
                }
            });

        </script>
    </body>
</html>
