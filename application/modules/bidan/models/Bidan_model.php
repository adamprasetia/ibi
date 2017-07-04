<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bidan_model extends CI_Model
{
	private $tbl_name = 'bidan';
	private $tbl_key = 'id';
	
	function query($id = '')
	{	
		$data[] = $this->db->select(array(
			'a.*',
			'b.name as status_pegawai_name',
			'c.name as wilayah_name',
			'd.name as pendidikan_name'
		));
		$data[] = $this->db->from($this->tbl_name.' a');
		$data[] = $this->db->join('status_pegawai b','a.status_pegawai=b.id','left');
		$data[] = $this->db->join('wilayah c','a.wilayah=c.id','left');
		$data[] = $this->db->join('pendidikan d','a.pendidikan=d.id','left');
		$search = $this->input->get('search');
		if($search <> '')
			$data[] = $this->db->where('(a.nomor like "%'.$search.'%" or a.name like "%'.$search.'%")');
		if($this->input->get('q'))
			$data[] = $this->db->where('a.name like "%'.$this->input->get('q').'%"');
		if($this->input->get('name'))
			$data[] = $this->db->where('a.name like "%'.$this->input->get('name').'%"');
		if($this->input->get('tempat_lahir'))
			$data[] = $this->db->where('a.tempat_lahir like "%'.$this->input->get('tempat_lahir').'%"');
		if($this->input->get('tanggal_lahir_from') <> '' && $this->input->get('tanggal_lahir_to') <> ''){
			$data[] = $this->db->where('a.tanggal_lahir >=',format_ymd($this->input->get('tanggal_lahir_from')));
			$data[] = $this->db->where('a.tanggal_lahir <=',format_ymd($this->input->get('tanggal_lahir_to')));
		}
		if($this->input->get('alamat'))
			$data[] = $this->db->where('a.alamat like "%'.$this->input->get('alamat').'%"');
		if($this->input->get('tlp'))
			$data[] = $this->db->where('a.tlp like "%'.$this->input->get('tlp').'%"');
		if($this->input->get('golongan_darah'))
			$data[] = $this->db->where('a.golongan_darah',$this->input->get('golongan_darah'));
		if($this->input->get('wilayah') != '' && $this->input->get('wilayah') != '-1'){
			$data[] = $this->db->where('a.wilayah',$this->input->get('wilayah'));
		}
		if($this->input->get('wilayah') == '-1'){
			$data[] = $this->db->where('a.wilayah',0);
		}
		if($this->input->get('kta_no'))
			$data[] = $this->db->where('a.kta_no like "%'.$this->input->get('kta_no').'%"');
		if($this->input->get('nomor'))
			$data[] = $this->db->where('a.nomor like "%'.$this->input->get('nomor').'%"');
		if($this->input->get('sertikom'))
			$data[] = $this->db->where('a.sertikom like "%'.$this->input->get('sertikom').'%"');
		if($this->input->get('praktik_nama'))
			$data[] = $this->db->where('a.praktik_nama like "%'.$this->input->get('praktik_nama').'%"');
		if($this->input->get('praktik_alamat'))
			$data[] = $this->db->where('a.praktik_alamat like "%'.$this->input->get('praktik_alamat').'%"');
		if($this->input->get('pendidikan') <> '')
			$data[] = $this->db->where('a.pendidikan',$this->input->get('pendidikan'));
		if($this->input->get('kampus'))
			$data[] = $this->db->where('a.kampus like "%'.$this->input->get('kampus').'%"');
		if($this->input->get('no_ijazah'))
			$data[] = $this->db->where('a.no_ijazah like "%'.$this->input->get('no_ijazah').'%"');
		if($this->input->get('tahun_lulus'))
			$data[] = $this->db->where('a.tahun_lulus like "%'.$this->input->get('tahun_lulus').'%"');
		if($this->input->get('tempat_kerja'))
			$data[] = $this->db->where('a.tempat_kerja like "%'.$this->input->get('tempat_kerja').'%"');
		if($this->input->get('status_pegawai') <> '')
			$data[] = $this->db->where('a.status_pegawai',$this->input->get('status_pegawai'));
		if($this->input->get('nip') <> '')
			$data[] = $this->db->where('a.nip',$this->input->get('nip'));
		if($this->input->get('kta') == '1'){
			$data[] = $this->db->join('bidan_kta kta','a.id=kta.bidan','left');
			$data[] = $this->db->where('kta.masa_berlaku <>',null);
			$data[] = $this->db->group_by('a.id');
		}
		if($this->input->get('kta') == '2'){
			$data[] = $this->db->join('bidan_kta kta','a.id=kta.bidan','left');
			$data[] = $this->db->where('kta.masa_berlaku',null);
			$data[] = $this->db->group_by('a.id');
		}
		if($this->input->get('str') == '1'){
			$data[] = $this->db->join('bidan_str str','a.id=str.bidan','left');
			$data[] = $this->db->where('str.nomor <>',null);
			$data[] = $this->db->group_by('a.id');
		}
		if($this->input->get('str') == '2'){
			$data[] = $this->db->join('bidan_str str','a.id=str.bidan','left');
			$data[] = $this->db->where('str.nomor',null);
			$data[] = $this->db->group_by('a.id');
		}
		if($this->input->get('sipb_p') == '1'){
			$data[] = $this->db->join('bidan_sipb_p sipb_p','a.id=sipb_p.bidan','left');
			$data[] = $this->db->where('sipb_p.nomor <>',null);
			$data[] = $this->db->group_by('a.id');
		}
		if($this->input->get('sipb_p') == '2'){
			$data[] = $this->db->join('bidan_sipb_p sipb_p','a.id=sipb_p.bidan','left');
			$data[] = $this->db->where('sipb_p.nomor',null);
			$data[] = $this->db->group_by('a.id');
		}
		if($this->input->get('sipb_m') == '1'){
			$data[] = $this->db->join('bidan_sipb_m sipb_m','a.id=sipb_m.bidan','left');
			$data[] = $this->db->where('sipb_m.nomor <>',null);
			$data[] = $this->db->group_by('a.id');
		}
		if($this->input->get('sipb_m') == '2'){
			$data[] = $this->db->join('bidan_sipb_m sipb_m','a.id=sipb_m.bidan','left');
			$data[] = $this->db->where('sipb_m.nomor',null);
			$data[] = $this->db->group_by('a.id');
		}
		if ($id) {
			$data[] = $this->db->where('a.id',$id);	
		}
		$data[] = $this->db->order_by($this->general->get_order_column('a.id'),$this->general->get_order_type('asc'));
		$data[] = $this->db->offset($this->general->get_offset());
		return $data;
	}
	function get($id = '')
	{
		$this->query($id);
		$this->db->limit($this->general->get_limit());
		return $this->db->get();
	}
	function count_all()
	{
		$this->query();
		return $this->db->get()->num_rows();
	}
	function chart_wilayah()
	{
		$query = 'select if(b.name is null,"Kosong",b.name) as name,
		sum(if(c.masa_berlaku,1,0)) as kta,
		sum(if(d.nomor,1,0)) as str,
		sum(if(e.nomor,1,0)) as sipb_p,
		sum(if(f.nomor,1,0)) as sipb_m
		from bidan a 
		left join wilayah b on a.wilayah = b.id
		left join bidan_kta c on a.id = c.bidan
		left join bidan_str d on a.id = d.bidan
		left join bidan_sipb_p e on a.id = e.bidan
		left join bidan_sipb_m f on a.id = f.bidan
		group by a.wilayah';
		return $this->db->query($query);
	}
	function chart_kta()
	{
		$query = 'select count(*) as value,if(b.masa_berlaku is not null,"Punya","Tidak Punya") as label from bidan a left join bidan_kta b on a.id = b.bidan group by if(b.masa_berlaku is not null,1,0) order by label asc';
		return $this->db->query($query);
	}
	function chart_str()
	{
		$query = 'select count(*) as value,if(b.nomor is not null,"Punya","Tidak Punya") as label from bidan a left join bidan_str b on a.id = b.bidan group by if(b.nomor is not null,1,0) order by label asc';
		return $this->db->query($query);
	}
	function chart_sipb_p()
	{
		$query = 'select count(*) as value,if(b.nomor is not null,"Punya","Tidak Punya") as label from bidan a left join bidan_sipb_p b on a.id = b.bidan group by if(b.nomor is not null,1,0) order by label asc';
		return $this->db->query($query);
	}
	function chart_sipb_m()
	{
		$query = 'select count(*) as value,if(b.nomor is not null,"Punya","Tidak Punya") as label from bidan a left join bidan_sipb_m b on a.id = b.bidan group by if(b.nomor is not null,1,0) order by label asc';
		return $this->db->query($query);
	}
	function punya_kta()
	{
		$query = 'select * from bidan a left join bidan_kta b on a.id = b.bidan where b.masa_berlaku is not null group by a.id';
		return $this->db->query($query);
	}
	function punya_str()
	{
		$query = 'select * from bidan a left join bidan_str b on a.id = b.bidan where b.nomor is not null group by a.id';
		return $this->db->query($query);
	}
	function punya_sipb_p()
	{
		$query = 'select * from bidan a left join bidan_sipb_p b on a.id = b.bidan where b.nomor is not null group by a.id';
		return $this->db->query($query);
	}
	function punya_sipb_m()
	{
		$query = 'select * from bidan a left join bidan_sipb_m b on a.id = b.bidan where b.nomor is not null group by a.id';
		return $this->db->query($query);
	}
}