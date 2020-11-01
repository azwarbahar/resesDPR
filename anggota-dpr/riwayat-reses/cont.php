<?php

require('../../koneksi.php');

//get lokasi
if(isset($_POST['req'])){
    if($_POST['req']=='getLokasi'){
        $id = $_POST['id'];
        $query = mysqli_query($conn, "SELECT * FROM tb_lokasi_reses WHERE id_jadwal='$id'");
        $data = '<option selected="selected" value="-">- Lokasi -</option>';
        foreach ($query as $dta){
            $data .= '<option value="'.$dta['id_lokasi'].'">'.$dta['nama_lokasi'].'</option>';
        }
        echo $data;
    } else if($_POST['req']=='getdata'){
        $idjadwal = $_POST['idjadwal'];
        $idlokasi = $_POST['idlokasi'];
        $idanggota = $_POST['idanggota'];
        // $data=[];
        $data = '';
        $query = mysqli_query($conn, "SELECT * FROM tb_aspirasi WHERE id_jadwal='$idjadwal' AND
                                                                      id_anggota='$idanggota' AND id_lokasi='$idlokasi'");
           $nomor = 1;
           foreach ($query as $dta){
                $data .= '
                                <tr>
                                    <td style="text-align:center">'.$nomor.'</td>
                                    <td>'.$dta['kegiatan'].'</td>
                                    <td>'.$dta['skpd'].'</td>
                                    <td>'.$dta['lokasi'].'</td>
                                    <td>'.$dta['status_aspirasi'].'</td>
                                </tr>';
                                $nomor = $nomor + 1;
            }
            if($data){
                echo $data;
            } else{
                echo '<tr class="odd"><td valign="top" colspan="5" class="dataTables_empty">No data available in table</td></tr>';
            }
    }



}




?>