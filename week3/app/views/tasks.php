<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Danh sách sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Todo List</a>
            <div class="ml-auto">
                
                <a href="http://week3.test/home/logout" class="btn btn-outline-danger" name="logout">Logout</a>
            </div>
        </div>
    </nav>
<div class="action-links">
   <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-open-form-add" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Thêm mới
</button>

    <input type="text" class="search-input" oninput="viewTask(this.value)">
    <button class="btn btn-secondary search-btn">Tìm kiếm</button>
    <button class="btn btn-info reset-btn">Reset</button>

   
    <!-- <a href="./index.php?page=view&id=<task_id>">Chi tiết</a> -->
</div>
<table class="table">
    <thead>

        <tr>
            <th>STT</th>
            <th>Title</th>
            <th>Content</th>
            <th>Status</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody class="table-body">
        <tr>
            <td> Đang tải ....</td>
        </tr>
    </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm mới</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
       
            <input type="text" class="form-control mt-2 title-task" placeholder="Title">
            
            <input type="text" class="form-control mt-2 content-task" placeholder="Content">
            <select name="status" class="form-control mt-2 status-task" id="">
              <option value="1">Đã hoàn thành</option>
              <option value="0">Chưa hoàn thành</option>
            </select>
            <input type="hidden" class="form-control mt-2 id-task" >
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="add-task">Thêm</button>
        <button type="button" class="btn btn-primary" id="edit-task">Cập nhật</button>
      </div>
    </div>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="../public/asset/js/task.js"></script>

</body>
</html>