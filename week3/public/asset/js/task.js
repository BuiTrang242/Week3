var addBtn = document.getElementById("add-task");
var titleTask = document.querySelector(".title-task");
var contentTask = document.querySelector(".content-task");
var statusTask = document.querySelector(".status-task");
var editBtn = document.getElementById("edit-task");
var formAddBtn = document.querySelector(".btn-open-form-add");
var searchBtn = document.querySelector(".search-btn");
var resetBtn = document.querySelector(".reset-btn");

formAddBtn.addEventListener("click", function() {
    editBtn.style.display = "none";
})
addBtn.addEventListener("click", function() {
    var task = {
        title: titleTask.value,
        content: contentTask.value,
        status: statusTask.value
    };
    console.log(task);
    if(task.title === "" || task.content === "" || task.status === "") {
        alert("Vui long nhap day du thong tin");
        return;
    }
    $.ajax({
        url: 'http://week3.test/task/add',
        type: 'POST',
        data: task,
        success: function(result) {
            console.log(result);
            let res = JSON.parse(result);
            if (res.status) {
                alert(res.message);
                $('#exampleModal').modal('hide');
                viewTask();
            }
        }
    });
   
})
function viewTask(keyword='') {
    $.ajax({
        url: 'http://week3.test/task/viewTask',
        type: 'POST',
        data: {
            keyword: keyword
        },
        success: function(result) {
            $(".table-body").html(result);
        }
    });
}
viewTask();

function deleteTask(id) {
    let result = confirm("Ban chac chan muon xoa");
    if(!result) {
     return;
    }
    $.ajax({
        url: 'http://week3.test/task/delete/' + id,
        type: 'POST',
        success: function(result) {
            viewTask();
        }
    })
}
function editTask(id) {
    addBtn.style.display = "none";
    editBtn.style.display = "block";
    $.ajax({
        url: 'http://week3.test/task/edit/' + id,
        type: 'POST',
        success: function(result) {
            let res = JSON.parse(result);
            titleTask.value = res.title;
            contentTask.value = res.content;
            statusTask.value = res.status;
            $(".id-task").val(id);
            $("#exampleModal").modal("show");
        }
    });
}
editBtn.addEventListener("click", function() {
    var task = {
        id: $(".id-task").val(),
        title: titleTask.value,
        content: contentTask.value,
        status: statusTask.value
    };
    $.ajax({
        url: 'http://week3.test/task/update',
        type: 'POST',
        data: task,
        success: function(result) {
            let res = JSON.parse(result);
            if (res.status) {
                alert(res.message);
                $('#exampleModal').modal('hide');
                viewTask();
            }
        }
    }); 
})

searchBtn.addEventListener("click", function() {
    var keyword = $(".search-input").val();
    viewTask(keyword);
})
resetBtn.addEventListener("click", function() {
    viewTask();
    $(".search-input").val("");
})