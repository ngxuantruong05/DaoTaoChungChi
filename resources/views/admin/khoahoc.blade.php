<!DOCTYPE html>
<html>

<head>
  @include('admin.admincss')
</head>

<body>
  <div class="wrapper">
    @include('admin.sidebar')
    <div class="main">
      @include('admin.navbar')
      <div class="container mt-4">
        <h2 class="text-center">Quản lý Khóa Học</h2>
        <div class="row">
          <!-- Cột hiển thị danh sách khóa học -->
          <div class="col-md-7">
            <h4>Danh sách khóa học</h4>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên khóa học</th>
                  <th>Giảng viên</th>
                  <th>Giá</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>
                @foreach($courses as $course)
                <tr>
                  <td>{{ $course->id }}</td>
                  <td>{{ $course->name_course }}</td>
                  <td>{{ $course->teacher ? $course->teacher->name_teacher : 'Không có giảng viên' }}</td>








                  <td>{{ $course->price }}</td>
                  <td>
                    <a href="#" class="btn btn-warning btn-sm">Sửa</a>
                    <a href="#" class="btn btn-danger btn-sm">Xóa</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <!-- Cột thêm khóa học -->
          <div class="col-md-5">
            <h4>Thêm khóa học</h4>
            <form method="POST" action="{{ route('add_course') }}">
              @csrf
              <div class="mb-3">
                <label for="name" class="form-label">Tên khóa học</label>
                <input type="text" class="form-control" id="name_course" name="name" required>
              </div>
              <div class="mb-3">
                <label for="instructor" class="form-label">Giảng viên</label>
                <input type="text" class="form-control" id="instructor" name="instructor" required>
              </div>
              <div class="mb-3">
                <label for="price" class="form-label">Giá</label>
                <input type="number" class="form-control" id="price" name="price" required>
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Mô tả khóa học</label>
                <textarea class="form-control" id="description" name="description" rows="4"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Lưu khóa học</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('admin.footer')
</body>

</html>