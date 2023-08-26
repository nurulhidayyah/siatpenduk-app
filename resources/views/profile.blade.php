@extends('layouts.landing')

@section('title')
    SIATPENDUK - Profile
@endsection

@section('content')
    <!-- Header -->
    <section class="header">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-xl-12 text-center">
                    <h1><span>PROFIL</span></h1>
                    <p>Temukan informasi mengenai Profil Desa Dukuh.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Header -->

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button"
                                                data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                Profil Instansi
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <strong>Nama Instansi:</strong> <br> Kantor Kelurahan Desa Dukuh <br><br>
                                            <strong>Alamat:</strong> <br> Kp.Dukuh Rt.014/05 Ds.Dukuh Kec.Kragilan Kode Pos 42184
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                                data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                                Visi & Misi
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            Visi dan misi adalah suatu gambaran yang menantang tentang keadaan masa depan yang diinginkan dengan melihat potensi dan kebutuhan desa.<br><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                                data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">
                                                Struktur Organisasi
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <strong>1). Kepala Desa</strong><br> Melaksanakan tugas sebagai berikut:<br>
                                            <ul>
                                                <li>
                                                    Kepala desa mempunyai tugas menyelenggarakan urusan pemerintaha, pembangunan, dan kemasyarakatan.
                                                </li>
                                                <li>
                                                    Wewenang kepala desa memimpin penyelenggaraan pemerintahan desa berdasarkan kebijakan yang ditetapkan bersama BPD. Mengajukan rancangan pemerintahan desa, menetapkan peraturan desa yang telah mendapat persetujuan bersama BPD, menyusun dan mengajukan rancangan peraturan desa bersama APB desa untuk dibahas dan ditetapkan bersama BPD, membina kehidupan masyarakat desa dan membina perekonomian desa.
                                                </li>
                                            </ul>

                                            <strong>2). Sekretaris Desa</strong> <br> Melaksanakan tugas dalam kesekretariatan
                                            meliputi:<br>
                                            <ul>
                                                <li>
                                                    Sekretaris desa mempuunyai tugas menjalankan kegiatan administrasi pemerintahan, pembangunan dan kemasyarakatan di desa serta memberikan pelayanan administrasi kepala desa.
                                                </li>
                                                <li>
                                                    Wewenang sekertaris desa pelaksanaan urusan surat menyurat, kearsipan dan pelaporan pelaksanaan administrasi pemerintahan diantaranya meliputi administrasi, pertanahan/keagrarian, kependudukan, pelaksanaan administrasi pembangunan dan pemberdayaan masyarakat. 
                                                </li>
                                            </ul>

                                            <strong>3). Kepala Urusan (KAUR) Tata Usaha (TU) Dan Umum</strong> <br>Memiliki tugas sebagai berikut:
                                            <br>
                                            <ul>
                                                <li>
                                                    Kaur tu dan umum mempunyai tugas menyelenggarakan kegiatan administrasi umum, personil dan urusan rumah tangga pemerintah desa.
                                                </li>
                                                <li>
                                                    Wewenang kaur tu dan umum melakukan koordinasi terhadap kegiatan yang dilakukan oleh perangkat desa lainnya dalam rangka penyelenggaraan administrasi kegiatan pemerintahan desa secara terpadu, mengumpulkan, menganalisa data dan merumuskan program serta petunjuk untuk keperluan penyelenggaraan tugas pemerinntahan desa, penyelenggaraan tata naskah dinas pemerintahan desa, pelaksanaan penyimpanan, pemeliharaan, dan mengamankan arsip, mensistematiskan buku-buku inventariis, dokumen milik desa, daftar hadir perangkat desa, dan memberikan pelayanan administrative pemerintahan desa.
                                                </li>
                                            </ul>

                                            <strong>4). Kepala Urusan Keuangan</strong> <br>Mempunyai tugas di bidang keuangan, meliputi:
                                            <br>
                                            <ul>
                                                <li>
                                                    Kaur keuagan mempunyai tugas menyelenggarakan kegiatan administrasi keuangan dan sumber pendapatan desa.
                                                </li>
                                                <li>
                                                    Wewenang kaur keuangan melakukan pelaksanaan administrasi keuangan dan pelaksanaan fungsi bendahara desa, pelaksanaan penyimpanan bahan penyusunan rancangan APBDes, perubahan, perhitungan dan pelaksanaan pertanggung jawaban APBDes, pelaksanaan pencatatan penerimaan dan pengeluaran keuangan desa dalam buku kas umum dan buku kas pembantu serta pelaksanaan penyusunan bahan dalam rangka penganggaran dan pertanggung jawaban Alokasi dana desa.
                                                </li>
                                            </ul>

                                            <strong>5). Kepala Urusan Perencanaan</strong>
                                            <br>Memiliki tugas di bidang perencanaan meliputi:
                                            <br>
                                            <ul>
                                                <li>
                                                    Kaur perencanaan bertugas membantu sekertaris desa dalam urusan pelayanan administrasi pendukung pelaksanaan tugas-tugas pemerintahan.
                                                </li>
                                                <li>
                                                    Wewenang kaur perencanaan Mengkoordinasi Menyusun rencana APBDesa, Mengkoordinasi dan menginventarisir data-data dalam pembangunan, Melakukan monitoring dan evaluasi program, serta penyusunan laporan, Melakukan fungsi lain yang diberikan sekretaris desa atau kepala desa.
                                                </li>
                                            </ul>

                                            <strong>6). Kepala Urusan Pemerintahan</strong>
                                            <br>Memiliki tugas di bidang pemerintahan meliputi:
                                            <br>
                                            <ul>
                                                <li>
                                                    Kaur pemerintahan mempunyai tugas menyelenggarakan kegiatan dan administrasi pemerintahan.
                                                </li>
                                                <li>
                                                    Wewenang kaur pemerintahan penyelenggaraan administrasi dan kegiatan pelayanan bidang pertanahan (agraris), pelaksanaan inventarisasi dan pencatatan administrasi pertanahan, penyelenggaraan administrasi dan kepelayanan kependudukan antara lain pelayanan kartu tanda penduduk, kartu keluarga, akte kelahiran, dan dokumen kependudukan lainnya.
                                                </li>
                                            </ul>

                                            <strong>7). Kepala Seksi Pelayanan</strong>
                                            <br>Memiliki tugas di bidang pelayanan meliputi:
                                            <br>
                                            <ul>
                                                <li>
                                                    Kasi pelayanan bertugas membantu kepala desa dalam melaksanakan tugas pelayanan sosial kemasyarakatan dan peningkatan kapasitas.
                                                </li>
                                                <li>
                                                    Wewenang kasi pelayanan melakukan tindakan yang mengakibatkan pengeluaran atas beban anggaran belanja sesuai bidang tugasnya melaksanakan anggaran kegiatan sesuai bidang tugasnya, mengendalikan kegiatan sesuai bidang tugasnya, menyusun (DPA) Dokumen Pelaksanaan Anggaran, (DPPA) Dokumen Perubahan Pelaksanaan Anggaran, dan (DPAL) Dokumen Pelaksanaan Anggaran Lanjutan sesuai bidang tugasnya, menandatangani perjanjian kerja sama dengan penyedia atas pengadaan barang/jasa untuk kegiatan yang berada dalam bidang tugasnya dan menyusun laporan pelaksanaan kegiatan sesuai bidang tugasnya untuk pertanggung jawaban pelaksanaan anggaran pendapatan dan belanja desa (APBDes).
                                                </li>
                                            </ul>

                                            <strong>8). Kepala Seksi Kesejahteraan</strong>
                                            <ul>
                                                <li>
                                                    Kasi Kesejahteraan bertugas membantu kepala desa dalam melaksanakan tugas bidang pembangunan dan pemberdayaan masyarakat desa.
                                                </li>
                                            </ul>

                                            <strong>9). Kepala Seksi Pemerintahan</strong>
                                            <ul>
                                                <li>
                                                    Kasi pemerintahan ini bertugas membantu kepala desa dalam melaksanakan tugas bidang pemerintahan desa.
                                                </li>
                                            </ul>

                                            <strong>10). Ketua RT/RW</strong>
                                            <ul>
                                                <li>
                                                    Ketua RT/RW ini bertugas membantu menjalankan tugas pelayanan pada masyarakat yang menjadi tanggung jawab pemerintah daerah, memelihara kerukunan hidup warga, menyusun rencana dan melaksanakan pembangunan dengan mengembangkan aspirasi dan swadaya murni masyarakat.
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
