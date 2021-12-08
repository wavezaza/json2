<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    title,th,td{
        border: 2px solid black;
        text-align: center;
    }
    .container{
        display: flex;
        justify-content: center;
    }
    .btn{
        width: 100%;
    }
</style>
<body>
    <button class="btn" id="B_Back"> back </button>
        <div class="container">
            <div id="Main">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>comment</th>
                        </tr>
                    </thead>
                    <tbody id="TB_Post">
                    </tbody>
                </table>
            </div>
            <div id="Detail">
                <table>
                    <thead id="TBL_Details_1">
                    </thead>
                    <tbody id="TBL_Details">
                    </tbody>
                </table>
            </div>
            <div id="Comment">
                <table>
                    <thead id="TBL_Comment_1">
                    </thead>
                    <tbody id="TBL_Comment">
                    </tbody>
                </table>
            </div>
        </div>
</body>
<script>
    function showDetails(id) {
        $("#Main").hide();
        $("#Detail").show();
        var url = "https://jsonplaceholder.typicode.com/posts/" + id
        $.getJSON(url)
            .done((data) => {
                console.log(data);
                var line_t2 = "<tr id='Detail_ROW'>";
                    line_t2 += "<th><b> ID </b></th>"
                    line_t2 += "<th><b> Title </b></th>"
                    line_t2 += "<th><b> UserId </b></th>"
                    line_t2 += "</tr>";
                    $("#TBL_Details_1").append(line_t2);
                var line_t1 = "<tr id='Detail_ROW_1'";
                    line_t1 += "><td>" + data.id + "</td>"
                    line_t1 += "<td><b>" + data.title + "</b><br/>"
                    line_t1 += data.body + "</td>"
                    line_t1 += "<td>" + data.userId + "</td>"
                    line_t1 += "</tr>";
                    $("#TBL_Details").append(line_t1);
            })
            .fail((xhr, err, status) => {
            })
    }
    function showComment(id) {
        $("#Main").hide();
        $("#Comment").show();
        var url = "https://jsonplaceholder.typicode.com/comments/" + id
        $.getJSON(url)
            .done((data) => {
                console.log(data);                
                var line_c2 = "<tr id='Comment_ROW'>";
                    line_c2 += "<th><b> ID </b></th>"
                    line_c2 += "<th><b> Name </b></b></th>"
                    line_c2 += "<th><b> Email </b></th>"
                    line_c2 += "<th><b> Title </b></th>"
                    line_c2 += "<th><b> PostID </b></th>"
                    line_c2 += "</tr>";
                    $("#TBL_Comment_1").append(line_c2);
                var line_c1 = "<tr id='Comment_ROW_1'";
                    line_c1 += "><td>" + data.id + "</td>"
                    line_c1 += "<td><b>" + data.name+ "</b></td>"
                    line_c1 += "<td>" + data.email + "</td>"
                    line_c1 += "<td>" + data.body + "</td>"
                    line_c1 += "<td>" + data.postId + "</td>"
                    line_c1 += "</tr>";
                    $("#TBL_Comment").append(line_c1);
            })
            .fail((xhr, err, status) => {
            })
    }
    function Posts() {
        var url = "https://jsonplaceholder.typicode.com/posts"
        $.getJSON(url)
            .done((data) => {
                $.each(data, (k, item) => {
                    var line = "<tr>";
                    line += "<td>" + item.id + "</td>"
                    line += "<td><b>" + item.title + "</b><br/>"
                    line += item.body + "</td>"
                    line += "<td><button onClick='showDetails(" + item.id + ");'>Link</button></td>"
                    line += "<td><button onClick='showComment(" + item.id + ");'>Comment</button></td>"
                    line += "</tr>";
                    $("#TB_Post").append(line);
                });
                $("#Main").show();
            })
            .fail((xhr, err, status) => {
            })
    }
    $(() => {
        Posts();
        $("#Detail").hide();
        $("#Comment").hide();
        $("#B_Back").click(() => {
            $("#Main").show();
            $("#Detail").hide();
            $("#Comment").hide();
            $("#Detail_ROW").remove();
            $("#Detail_ROW_1").remove();
            $("#Comment_ROW").remove();
            $("#Comment_ROW_1").remove();
        });
    })
</script>
</html>
