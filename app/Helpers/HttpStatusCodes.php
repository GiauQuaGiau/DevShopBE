<?php

namespace App\Helpers;

class HttpStatusCodes
{
    // Mã lỗi thành công
    const OK = 200; // Thành công

    // Mã lỗi redirect
    const MOVED_PERMANENTLY = 301; // Chuyển hướng vĩnh viễn
    const FOUND = 302; // Được tìm thấy (tạm thời chuyển hướng)
    const SEE_OTHER = 303; // Xem lại (tạm thời chuyển hướng)
    const NOT_MODIFIED = 304; // Không sửa đổi (có thể dùng cache)

    // Mã lỗi client error
    const BAD_REQUEST = 400; // Yêu cầu không hợp lệ
    const UNAUTHORIZED = 401; // Không được ủy quyền
    const FORBIDDEN = 403; // Cấm truy cập
    const NOT_FOUND = 404; // Không tìm thấy
    const METHOD_NOT_ALLOWED = 405; // Phương thức không được phép
    const REQUEST_TIMEOUT = 408; // Hết thời gian yêu cầu

    // Mã lỗi server error
    const INTERNAL_SERVER_ERROR = 500; // Lỗi máy chủ nội bộ
    const NOT_IMPLEMENTED = 501; // Chưa thực hiện
    const SERVICE_UNAVAILABLE = 503; // Dịch vụ không khả dụng
    const GATEWAY_TIMEOUT = 504; // Hết thời gian cổng

    // Mã lỗi khác
    const HTTP_VERSION_NOT_SUPPORTED = 505; // Phiên bản HTTP không được hỗ trợ
    const NETWORK_AUTHENTICATION_REQUIRED = 511; // Yêu cầu xác thực mạng

    // Bổ sung thêm mã lỗi và ghi chú tại đây
    // static function createResponse($data, $status = self::OK, $header = []) {
    //     return response()->json($data, $status, $header);
    // }
}
