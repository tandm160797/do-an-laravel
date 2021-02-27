<?php
Route::get('/', function () {
    return redirect()->route('quan-tri-vien.danh-sach');
})->name('layout');
//
Route::prefix('quan-tri-vien')->group(function () {
    Route::name('quan-tri-vien.')->group(function () {
        Route::get('/dang-nhap', 'QuanTriVienController@dangNhap')->name('dang-nhap')->middleware('guest');
        Route::post('/xu-ly-dang-nhap', 'QuanTriVienController@xuLyDangNhap')->name('xu-ly-dang-nhap');
        Route::get('/dang-xuat', 'QuanTriVienController@dangXuat')->name('dang-xuat');
        //
        Route::middleware('auth')->group(function(){
            Route::get('/trang-ca-nhan', 'QuanTriVienController@trangCaNhan')->name('trang-ca-nhan');
            Route::get('/doi-ten/{id}', 'QuanTriVienController@doiTen')->name('doi-ten');
            Route::put('/doi-ten/{id}', 'QuanTriVienController@xuLyDoiTen')->name('xu-ly-doi-ten');
            Route::get('/doi-mat-khau/{id}', 'QuanTriVienController@doiMatKhau')->name('doi-mat-khau');
            Route::put('/doi-mat-khau/{id}', 'QuanTriVienController@xuLyDoiMatKhau')->name('xu-ly-doi-mat-khau');
        });
    });
});
//
Route::middleware('auth')->group(function(){
    Route::prefix('quan-tri')->group(function () {
        Route::prefix('quan-tri-vien')->group(function () {
            Route::name('quan-tri-vien.')->group(function () {
                Route::get('/', 'QuanTriVienController@index')->name('danh-sach');
                Route::get('/them-moi', 'QuanTriVienController@create')->name('them-moi');
                Route::post('/them-moi', 'QuanTriVienController@store')->name('xu-ly-them-moi');
                Route::get('/xoa/{id}', 'QuanTriVienController@destroy')->name('xoa');
                //
                Route::get('/thung-rac', 'QuanTriVienController@onlyTrashed')->name('thung-rac');
                Route::get('/khoi-phuc/{id}', 'QuanTriVienController@restore')->name('khoi-phuc');
                Route::get('/xoa-bo/{id}', 'QuanTriVienController@delete')->name('xoa-bo');
                //
                Route::get('/khoi-phuc-mat-khau/{id}', 'QuanTriVienController@resetPassword')->name('khoi-phuc-mat-khau');
            });
        });
        //
        Route::prefix('linh-vuc')->group(function () {
            Route::name('linh-vuc.')->group(function () {
                Route::get('/', 'LinhVucController@index')->name('danh-sach');
                Route::get('/them-moi', 'LinhVucController@create')->name('them-moi');
                Route::post('/them-moi', 'LinhVucController@store')->name('xu-ly-them-moi');
                Route::get('/cap-nhat/{id}', 'LinhVucController@edit')->name('cap-nhat');
                Route::put('/cap-nhat/{id}', 'LinhVucController@update')->name('xu-ly-cap-nhat');
                Route::get('/xoa/{id}', 'LinhVucController@destroy')->name('xoa');
                //
                Route::get('/thung-rac', 'LinhVucController@onlyTrashed')->name('thung-rac');
                Route::get('/khoi-phuc/{id}', 'LinhVucController@restore')->name('khoi-phuc');
                Route::get('/xoa-bo/{id}', 'LinhVucController@delete')->name('xoa-bo');
            });
        });
        //
        Route::prefix('cau-hoi')->group(function () {
            Route::name('cau-hoi.')->group(function () {
                Route::get('/', 'CauHoiController@index')->name('danh-sach');
                Route::get('/them-moi', 'CauHoiController@create')->name('them-moi');
                Route::post('/them-moi', 'CauHoiController@store')->name('xu-ly-them-moi');
                Route::get('/cap-nhat/{id}', 'CauHoiController@edit')->name('cap-nhat');
                Route::put('/cap-nhat/{id}', 'CauHoiController@update')->name('xu-ly-cap-nhat');
                Route::get('/xoa/{id}', 'CauHoiController@destroy')->name('xoa');
                //
                Route::get('/thung-rac', 'CauHoiController@onlyTrashed')->name('thung-rac');
                Route::get('/khoi-phuc/{id}', 'CauHoiController@restore')->name('khoi-phuc');
                Route::get('/xoa-bo/{id}', 'CauHoiController@delete')->name('xoa-bo');
            });
        });
        //
        Route::prefix('goi-credit')->group(function () {
            Route::name('goi-credit.')->group(function () {
                Route::get('/', 'GoiCreditController@index')->name('danh-sach');
                Route::get('/them-moi', 'GoiCreditController@create')->name('them-moi');
                Route::post('/them-moi', 'GoiCreditController@store')->name('xu-ly-them-moi');
                Route::get('/cap-nhat/{id}', 'GoiCreditController@edit')->name('cap-nhat');
                Route::put('/cap-nhat/{id}', 'GoiCreditController@update')->name('xu-ly-cap-nhat');
                Route::get('/xoa/{id}', 'GoiCreditController@destroy')->name('xoa');
                //
                Route::get('/thung-rac', 'GoiCreditController@onlyTrashed')->name('thung-rac');
                Route::get('/khoi-phuc/{id}', 'GoiCreditController@restore')->name('khoi-phuc');
                Route::get('/xoa-bo/{id}', 'GoiCreditController@delete')->name('xoa-bo');
            });
        });
        //
        Route::prefix('nguoi-choi')->group(function () {
            Route::name('nguoi-choi.')->group(function () {
                Route::get('/', 'NguoiChoiController@index')->name('danh-sach');
                Route::get('/them-moi', 'NguoiChoiController@create')->name('them-moi');
                Route::post('/them-moi', 'NguoiChoiController@store')->name('xu-ly-them-moi');
                Route::get('/cap-nhat/{id}', 'NguoiChoiController@edit')->name('cap-nhat');
                Route::put('/cap-nhat/{id}', 'NguoiChoiController@update')->name('xu-ly-cap-nhat');
                Route::get('/xoa/{id}', 'NguoiChoiController@destroy')->name('xoa');
                //
                Route::get('/thung-rac', 'NguoiChoiController@onlyTrashed')->name('thung-rac');
                Route::get('/khoi-phuc/{id}', 'NguoiChoiController@restore')->name('khoi-phuc');
                Route::get('/xoa-bo/{id}', 'NguoiChoiController@delete')->name('xoa-bo');
                //
                Route::get('/{id}/luot-choi','LuotChoiController@luotChoisById')->name('luot-choi-theo-id');
                Route::get('/{id}/lich-su-mua-credit','LichSuMuaCreditController@lichSuMuaCreditsById')->name('lich-su-mua-credit-theo-id');
            });
        });
        //
        Route::prefix('luot-choi')->group(function () {
            Route::name('luot-choi.')->group(function () {
                Route::get('/', 'LuotChoiController@index')->name('danh-sach');
                Route::get('/them-moi', 'LuotChoiController@create')->name('them-moi');
                Route::post('/them-moi', 'LuotChoiController@store')->name('xu-ly-them-moi');
                Route::get('/cap-nhat/{id}', 'LuotChoiController@edit')->name('cap-nhat');
                Route::put('/cap-nhat/{id}', 'LuotChoiController@update')->name('xu-ly-cap-nhat');
                Route::get('/xoa/{id}', 'LuotChoiController@destroy')->name('xoa');
                //
                Route::get('/thung-rac', 'LuotChoiController@onlyTrashed')->name('thung-rac');
                Route::get('/khoi-phuc/{id}', 'LuotChoiController@restore')->name('khoi-phuc');
                Route::get('/xoa-bo/{id}', 'LuotChoiController@delete')->name('xoa-bo');
                //
                Route::get('/{id}/chi-tiet-luot-choi','ChiTietLuotChoiController@chiTietLuotChoisById')->name('chi-tiet-luot-choi-theo-id');

            });
        });
        //
        Route::prefix('chi-tiet-luot-choi')->group(function () {
            Route::name('chi-tiet-luot-choi.')->group(function () {
                Route::get('/', 'ChiTietLuotChoiController@index')->name('danh-sach');
                Route::get('/them-moi', 'ChiTietLuotChoiController@create')->name('them-moi');
                Route::post('/them-moi', 'ChiTietLuotChoiController@store')->name('xu-ly-them-moi');
                Route::get('/cap-nhat/{id}', 'ChiTietLuotChoiController@edit')->name('cap-nhat');
                Route::put('/cap-nhat/{id}', 'ChiTietLuotChoiController@update')->name('xu-ly-cap-nhat');
                Route::get('/xoa/{id}', 'ChiTietLuotChoiController@destroy')->name('xoa');
                //
                Route::get('/thung-rac', 'ChiTietLuotChoiController@onlyTrashed')->name('thung-rac');
                Route::get('/khoi-phuc/{id}', 'ChiTietLuotChoiController@restore')->name('khoi-phuc');
                Route::get('/xoa-bo/{id}', 'ChiTietLuotChoiController@delete')->name('xoa-bo');
            });
        });
        //
        Route::prefix('lich-su-mua-credit')->group(function () {
            Route::name('lich-su-mua-credit.')->group(function () {
                Route::get('/', 'LichSuMuaCreditController@index')->name('danh-sach');
                Route::get('/them-moi', 'LichSuMuaCreditController@create')->name('them-moi');
                Route::post('/them-moi', 'LichSuMuaCreditController@store')->name('xu-ly-them-moi');
                Route::get('/cap-nhat/{id}', 'LichSuMuaCreditController@edit')->name('cap-nhat');
                Route::put('/cap-nhat/{id}', 'LichSuMuaCreditController@update')->name('xu-ly-cap-nhat');
                Route::get('/xoa/{id}', 'LichSuMuaCreditController@destroy')->name('xoa');
                //
                Route::get('/thung-rac', 'LichSuMuaCreditController@onlyTrashed')->name('thung-rac');
                Route::get('/khoi-phuc/{id}', 'LichSuMuaCreditController@restore')->name('khoi-phuc');
                Route::get('/xoa-bo/{id}', 'LichSuMuaCreditController@delete')->name('xoa-bo');
            });
        });
    });
    //
    Route::prefix('cau-hinh')->group(function () {
        Route::prefix('cau-hinh-diem-cau-hoi')->group(function () {
            Route::name('cau-hinh-diem-cau-hoi.')->group(function () {
                Route::get('/', 'CauHinhDiemCauHoiController@index')->name('danh-sach');
                Route::get('/them-moi', 'CauHinhDiemCauHoiController@create')->name('them-moi');
                Route::post('/them-moi', 'CauHinhDiemCauHoiController@store')->name('xu-ly-them-moi');
                Route::get('/cap-nhat/{id}', 'CauHinhDiemCauHoiController@edit')->name('cap-nhat');
                Route::put('/cap-nhat/{id}', 'CauHinhDiemCauHoiController@update')->name('xu-ly-cap-nhat');
                Route::get('/xoa/{id}', 'CauHinhDiemCauHoiController@destroy')->name('xoa');
                //
                Route::get('/thung-rac', 'CauHinhDiemCauHoiController@onlyTrashed')->name('thung-rac');
                Route::get('/khoi-phuc/{id}', 'CauHinhDiemCauHoiController@restore')->name('khoi-phuc');
                Route::get('/xoa-bo/{id}', 'CauHinhDiemCauHoiController@delete')->name('xoa-bo');
            });
        });
    });
});