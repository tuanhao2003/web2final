
create table TaiKhoan
(
    MaTK                CHAR(7)                 NOT NULL,
    TenDangNhap         CHAR(50),
    MatKhau             VARCHAR(50),
    TrangThai           INT                     NOT NULL,
    URLHinh             VARCHAR(200)            NOT NULL,
    PRIMARY KEY (MaTK)
);

create table Quyen
(
        MaTK                CHAR(7)                 NOT NULL,
        PhanQuyen           VARCHAR(20)             NOT NULL,
        PRIMARY KEY (MaTK),
        FOREIGN KEY (MaTK) REFERENCES TaiKhoan(MaTK)
);

create table Hang
(
    MaHang              CHAR(7)                 NOT NULL,
    TenHang             VARCHAR(100),
    PRIMARY KEY (MaHang)
);

create table SanPham
(
    MaSP                CHAR(7)                 NOT NULL,
    TenSP               VARCHAR(20)             NOT NULL,
    DonGia              INT                     NOT NULL,
    HinhAnh             VARCHAR(200)            NOT NULL,
    MoTa                VARCHAR(1000)           ,
    TrangThaiTonTai     INT                     NOT NULL,
    MaHang              CHAR(7)                 NOT NULL,
    PRIMARY KEY (MaSP),
    FOREIGN KEY (MaHang) REFERENCES Hang(MaHang)
);

create table KhachHang
(
    MaKH                CHAR(7)                 NOT NULL,
    TenKH               VARCHAR(40)             NOT NULL,
    DiaChi              VARCHAR(100),
    NgaySinh            DATETIME                NOT NULL,
    Email               VARCHAR(50),
    SDT                 VARCHAR(10),
    MaTK                CHAR(7)                 NOT NULL,
    PRIMARY KEY (MaKH),
    FOREIGN KEY (MaTK) REFERENCES TaiKhoan(MaTK)
);

create table GioHang
(
    MaKH                CHAR(7)                 NOT NULL,
    MaSP                CHAR(7)                 NOT NULL,
    FOREIGN KEY (MaKH) REFERENCES KhachHang(MaKH),
    FOREIGN KEY (MaSP) REFERENCES SanPham(MaSP)
);

create table HoaDon
(
    MaHD                CHAR(7)                 NOT NULL,
    MaKH                CHAR(7)                 NOT NULL,
    HinhThucTra         NVARCHAR(40),
    NgayLap             DATETIME,
    TongGiaGoc          INT                     NOT NULL,
    PRIMARY KEY (MaHD),
    FOREIGN KEY (MaKH) REFERENCES KhachHang(MaKH)
);

create table CTHoaDon
(
    MaHD                CHAR(7)                 NOT NULL,
    MaSP                CHAR(7)                 NOT NULL,
    SoLuong             INT,
    GiaTien             INT,
    FOREIGN KEY (MaHD) REFERENCES HoaDon(MaHD),
    FOREIGN KEY (MaSP) REFERENCES SanPham(MaSP)
);

create table GiaoHang
(
    MaVanDon           CHAR(7)                 NOT NULL,
    NgayGiao           DATETIME,
    NgayNhán            DATETIME,
    TinhTrang          VARCHAR(20)             NOT NULL,
    DiaDiem            VARCHAR(200),
    MaHD               CHAR(7)                 NOT NULL,
    PRIMARY KEY (MaVanDon),
    FOREIGN KEY (MaHD) REFERENCES HoaDon(MaHD)
);
