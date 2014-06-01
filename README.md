siaek
=====
kependekan dari sistem informasi absensi dan evaluasi kegiatan
tambahkan baris dibawah ini ya setelah clone
+Collaborator

	+1. [hallo choirudin]

	+2. [hallo herman :DD] 

	+3. [halllo jihan]

	+4. [hallo ini yane]

	+5. [hallo kak coba masukin nama kak giri di sini]


	kak edit table absensi

	CREATE TABLE `absensi` (
  `id_peserta` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `alasan` text NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `id_peserta` (`id_peserta`),
  KEY `id_kegiatan` (`id_kegiatan`),
  KEY `id_status` (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;