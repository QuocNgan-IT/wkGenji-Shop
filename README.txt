QUAN TRỌNG: (PHP thuần, JavaScript chiếm nhiều là do dùng TinyMCE)
	* Phiên bản Xampp v3.3.0 ; PHP Version 8.0.10
	
	* Cần import 2 cơ sở dữ liệu: quanlybanhang.sql và quanlytrangweb.sql
		- CSDL quanlybanhang em vẫn giữ nguyên số table theo đề yêu cầu, nhưng các cột thì có thay đổi để phù hợp với cửa hàng
		- CSDL quanlytrangweb để lưu các thông tin về chức năng, danh mục, banner,... để tiện thêm, sửa, xóa các phần đấy (chưa phát triển đầy đủ)
	
	* Bài thực hành gồm 2 trang web:
		Trang khách hàng: khach_hang		http://localhost/b1805892/khach_hang/
		Trang quản trị: quan_tri			http://localhost/b1805892/quan_tri/
		
	* Tài khoản khách hàng
		Ký danh: wkGenji 	(Không phân biệt hoa thường)
		Mật khẩu: 123		(Cái này thì bắt buộc nhập đúng :D )
		
	* Tài khoản nhân viên (chỉ có thể dùng các chức năng như: quản lý đơn hàng, thêm sản phẩm,... trong trang quản trị)
		Ký danh: nhanvien
		Mật khẩu: nhanvienpass
		
		** Tài khoản admin (có đầy đủ các chức năng của trang quản trị (sẽ phát triển thêm trong tương lai)) [Hiện chưa dùng được]
		Ký danh: admin
		Mật khẩu: adminpass
		
	* Tài khoản CSDL
		Ký danh: root
		Mật khẩu: (rỗng)
	
Mô tả:
	- Em vừa code vừa tham khảo, tìm hiểu trên khá nhiều trang hỏi đáp, hướng dẫn nên code nhìn thiếu chuyên nghiệp, mong thầy thông cảm ạ :c
	- Trang quản trị có 2 loại tài khoản để đăng nhập:
		+ Tài khoản nhân viên: Có các chức năng như quản lý đơn hàng, quản lý sản phẩm,..
		+ Tài khoản admin: Có các chức năng của tài khoản nhân viên, thêm các chức năng như thay đổi banner cửa hàng, quản lý menu, quản lý danh mục,... (Do thiếu thời gian nên chưa triển khai)

Các chức năng chưa hoàn thiện:
	- Chức năng đăng ký cho khách hàng mới chưa thực hiện, do lúc làm bị lỗi tới lỗi lui, sửa mãi không hết nên không có thời gian để phát triển thêm ạ..
		Tạm thời thì khách hàng duy nhất có tài khoản đăng nhập là wkGenji (nickname của em :D ). Khi vào giỏ hàng, web sẽ tự gọi ra các thông tin định trước trong CSDL của tài khoản vào biểu mẫu mua hàng. Nếu người dùng thay đổi thông tin thì khi thực hiện mua hàng, thông tin đó sẽ được update vào CSDL và được gọi ra trong lần mua hàng tiếp theo.
	
