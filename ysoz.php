<?php

/*
Plugin Name: Yakuter Rastgele Sözler
Plugin URI: http://www.yakuter.com/yakuter-rastgele-sozler-eklentisi-20
Description: Sitenizin her açılışında yeni bir söz veya resim gibi içerik göstermeye yarar.
Version: 4.0
Author: Erhan Yakut (yakuter)
Author URI: http://www.yakuter.com
*/

/*  Copyright 2006-2009 Erhan Yakut (yakuter: yakuter at gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

/* ********** Yeni Söz-New Quote ********** */
function ysoz_soz_ekle ()
{  global $wpdb ;
	$yenisoz= "INSERT INTO ".$wpdb->ysoz." VALUES ('','".$_POST['metin']."')";
	$wpdb->query($yenisoz); 
	echo '<div id="message" class="updated fade"><p>Yeni söz eklendi! </p></div>';
}

/* ********** Yeni Söz Ekleme Formu-New Quote Form ********** */
function ysoz_soz_ekle_form ()
{ 
	echo '<form  action="'.$_SERVER['REQUEST_URI'].'"  onsubmit="return KontrolEt();" method="post" >
	<h3>Yeni Söz</h3>
	<ul>	
		<li>';
			
				$args = array('textarea_rows' => 8,'teeny' => true,'quicktags' => true);
				wp_editor( '', 'metin', $args );
				submit_button( 'Sözü Ekle' );
				echo '<input type="hidden" name="islem" value="ekle">
		</li>
	</ul>
	</form>';
}

/* ********** Söz Sil - Delete Quote ********** */
function ysoz_soz_sil ()
{	global $wpdb ;
		$silinecek="DELETE FROM ".$wpdb->ysoz." WHERE id='".$_GET['silno']."'";
		$wpdb->query($silinecek);
		echo '<div id="message" class="updated fade"><p><strong>Söz silindi!</strong></p></div>';
}

/* ********** Söz Düzenle - Edit Quote ********** */
function ysoz_soz_duzenle()
{	global $wpdb ;
		$sqlduzenle="update ".$wpdb->ysoz." set metin='".$_POST['metin']."' where id='".$_POST['id']."' ";
		$wpdb->query($sqlduzenle);
		echo '<div id="message" class="updated fade"><p><strong>Söz düzenlendi!</strong></p></div>';
}

/* ********** Söz Düzenleme Formu  - Quote Editing Form ********** */
function ysoz_soz_duzenle_form()
{	global $wpdb ;
	$sorgutekipucu = "SELECT * FROM $wpdb->ysoz where id=".$_GET['degistir'];
	$sonuclartekipucu = $wpdb->get_row($sorgutekipucu);
	if ($sonuclartekipucu) { 
?>
	<form  action="<?php echo $_SERVER['REQUEST_URI']; ?>"  onsubmit="return KontrolEt();" method="post" >
	<h3>Söz Düzenle</h3>
	<ul>	
		<li><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=ysoz.php">Yeni Söz Ekle</a></li>
		<li>
			<?php 
				$args = array('textarea_rows' => 8,'teeny' => true,'quicktags' => true);
				wp_editor( $sonuclartekipucu->metin, 'metin', $args );
				submit_button( 'Sözü Güncelle' );
			?>
			<input type="hidden" name="islem" value="duzenle">
			<input TYPE="hidden" name="id" value="<?php echo $sonuclartekipucu->id; ?>"></li>	
	</ul>
	</form>

<?php	}	
}

/* ********** Mevcut Sözler - Current Quotes ********** */
function ysoz_mevcut_sozler()	
{	global $wpdb;	

	echo "<h3>Mevcut Sözler</h3>";
		$sorgu = "SELECT * FROM $wpdb->ysoz order by id desc";
		$sonuclar = $wpdb->get_results($sorgu);
		if ($sonuclar) { 

	echo "<table class=\"widefat\">
	<thead>
	    <tr>
	        <th>ID</th>
	        <th>Söz</th>      
	        <th>İşlem</th>
	    </tr>
	</thead>
	<tfoot>
	    <tr>
	    	<th>No</th>
	    	<th>Söz</th>      
	        <th>İşlem</th>
	    </tr>
	</tfoot>
	<tbody>";
			foreach ($sonuclar as $sonuc) {
?>	
	<tr>	
     	<td>#<?php echo $sonuc->id; ?></td>
     	<td><?php echo $sonuc->metin; ?></td>
     	<td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=ysoz.php&islem=sil&silno=<?php echo $sonuc->id; ?>">Sil</a> - <a href="<?php echo $_SERVER['PHP_SELF']; ?>?page=ysoz.php&degistir=<?php echo $sonuc->id; ?>">Düzenle</a></td>
     </tr>
<?php
			}
	echo "</tbody>
		</table>";
		} else { echo "Henüz hiç söz bulunmuyor!"; }
}

/* ********** Tema Fonksiyonu - Template Function ********** */
function ysoz($ysozID='')
{	global $wpdb;	
		if ($ysozID) {
			$sorgu = "SELECT metin FROM $wpdb->ysoz WHERE id='$ysozID'";
			$sonuc = $wpdb->get_var($sorgu);
			if ($sonuc) {echo $sonuc;} else {echo 'Belirtmiş olduğunuz söz bulunamadı!';}
		} else {
			$sorgu = "SELECT metin FROM $wpdb->ysoz ORDER BY RAND() limit 0,1 ";
			$sonuc = $wpdb->get_var($sorgu);
			if ($sonuc) { echo $sonuc; }		
		}
}

/* ********** Yönetim Paneli Fonksiyonu - Admin Page Function ********** */
function ysoz_admin() 
{	global $wpdb,$wpcf_strings;
		echo '<div class="wrap">';
		echo '<div id="icon-edit-comments" class="icon32"><br /></div><h2>Yakuter Rastgele Sözler</h2>';
		if ($_POST['islem']== 'ekle') { ysoz_soz_ekle (); }
		if ($_GET['islem']== 'sil') { ysoz_soz_sil (); }
		if ($_POST['islem']== 'duzenle') { ysoz_soz_duzenle (); }
		ysoz_mevcut_sozler();
		if (!isset($_GET['degistir'])) 
		{	ysoz_soz_ekle_form();	} 
		else
		{ ysoz_soz_duzenle_form(); }
		echo "</div>";

 }

/* ********** Yönetim Paneli - Admin Page ********** */
add_action('admin_menu', 'yonetime_ekle');
function yonetime_ekle() {
	add_submenu_page('options-general.php', 'Rastgele Sözler', 'Rastgele Sözler', 10, __FILE__, 'ysoz_admin');
}

/* ********** Veritabani yükleme - DB Install ********** */
$wpdb->ysoz = $wpdb->prefix . 'ysoz'; 

function ysoz_install() 
{	global $wpdb;
	$db_sql="CREATE TABLE IF NOT EXISTS `$wpdb->ysoz` (
  			`id` bigint(20) NOT NULL auto_increment,
  			`metin` text NOT NULL ,
   			PRIMARY KEY  (`id`)
			)";
	$wpdb->query($db_sql);
} 

register_activation_hook(__FILE__,'ysoz_install');

?>
