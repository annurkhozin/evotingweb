<div class="modal-header" style="text-align:center;">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <span ><strong>Data Campaign</strong></span>
</div>
<div class="modal-body">
        <table class="table">
        <thead>
        <tr>
            <th>No</th>
            <th>Campaign</th>
            <th>Tahun</th>
            <th>Mulai</th>
            <th>Selesai</th>
            <th>Status</th>
            <th class="text-center">opsi</th>
        </tr>
        </thead>
        <tbody>
        <?php $camp = $this->db->select()->from('tahun_pemilihan AS A')
    ->join('campaign AS B','B.id_campaign = A.id_campaign')->order_by('A.selesai','DESC')->get();?>
    <?php $no=1; foreach($camp->result() as $row){ ?>
        <tr>
            <td><?=$no;?></td>
            <td><?=$row->nama_campaign?></td>
            <td><?=$row->tahun?></td>
            <td><?=dt($row->mulai)?></td>
            <td><?=dt($row->selesai)?></td>
            <td><?php if(($row->mulai<=date_time()) AND ($row->selesai>=date_time())){ echo 'Aktif';}else{ echo 'Tidak aktif';}?></td>
            <td class="text-center"><a href="<?=base_url().'view/'.$row->id_campaign.'/'.$row->tahun?>" class="btn btn-info"><i class="fa fa-eye"></i> Lihat</a></td>
        </tr>
        
    <?php $no++; }?>
        </tbody>
    </table>
</div>
<div class="modal-footer" style="text-align:center;">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
