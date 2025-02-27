<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class adminController extends Controller
{
    public function adminhome()
    {
        $role = Auth::user()->role;
        if ($role == 'admin') {
            return view('admin.adminhome');
        } else if ($role == 'instructor') {
            return view('teacher.teacherhome');
        } else if($role == 'staff'){
            return view('staff.staffhome');
        } else if($role == 'student'){
            return view('student.studenthome');
        }
         else {
            return redirect()->back();
        }
        
    }


    public function khoa_hoc()
    {
        // Lấy danh sách khóa học và kèm theo thông tin giảng viên từ bảng teachers
        $courses = Course::with('teacher')->get();

        // Truyền dữ liệu vào view
        return view('admin.khoahoc', compact('courses'));
    }
    
    public function add_course(Request $request)
    {
        // Xác nhận form dữ liệu
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'instructor_id' => 'required|exists:teachers,id', // Kiểm tra giảng viên hợp lệ
            'price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        // Tạo khóa học mới
        $course = new Course();
        $course->name_course = $request->name_course;
        $course->price = $request->price;
        $course->description = $request->description;
        $course->teacher_id = $request->instructor_id;
        $course->save();

        // Quay lại trang danh sách khóa học
        return redirect()->route('admin.khoahoc')->with('success', 'Khóa học đã được thêm thành công!');
    }
}
