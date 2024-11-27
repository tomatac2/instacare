    <style>
        .box {
            background-color: black;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .box a {
            padding: 15px;
            background-color: #fff;
            border-radius: 3px;
            text-decoration: none;
        }

        .modal {
            position: fixed;
            inset: 0;
            background: rgba(254,
                    126,
                    126,
                    0.7);
            display: none;
            align-items: center;
            justify-content: center;
        }

        .content {
            position: relative;
            background: white;
            padding: 1em 2em;
            border-radius: 4px;
        }

        .modal:target {
            display: flex;
        }
    </style>


 
    <div id="popup-box" class="modal">
        <div class="content">
            <h1 style="color: green">
                Hello GeeksForGeeks!
            </h1>
            <p>Never Give Up!</p>
            <a href="#" style="
                        position: absolute;
                        top: 10px;
                        right: 10px;
                        color: #fe0606;
                        font-size: 30px;
                        text-decoration: none;
                    ">&times;</a>
        </div>
    </div>

