Yakuter Rastgele Sözler Eklentisi
=================================

Yakuter Rastgele Sözler Eklentisi, WordPress günlüklerinizin istediğiniz herhangi bir yerinde rastgele söz/metin/resim gibi içerikler görüntülemenize yardımcı olması maksadıyla tarafımdan yazılmış bi Wordpress eklentisidir.

// Sürüm Bilgisi ve Özellikleri
Yakuter Rastgele Sözler Eklentisi'nin mevcut sürümü 4.0 olup aşağıdaki özellikleri içermektedir.

* Yönetim panelindeki menüsünden dilediğiniz kadar içerik girebilir ve sitede bunların rastgele görüntülenmesini sağlayabilirsiniz.
* Söz ekleme formu WordPress’in kendi bünyesindeki yazı düzenleyicisi olup girdiğiniz metinleri dilediğiniz gibi biçimlendirebilir ve ortam dosyaları yükleyebilirsiniz.
* Girmiş olduğunuz herhangi bir sözün sabit olarak görüntülenmesini sağlayabilirsiniz.
* HTML etiketleri kullanabilir ve böylece sözlerinizi daha iyi görüntüleyebilirsiniz.
* Söz ekleme panelinde Quicktag’lerden faydalanarak kullanışlı bir düzenleyicinin keyfini çıkarabilirsiniz.
* HTML etiketleri vasıtasıyla içerik olarak resim girebilir ve sitenizde rastgele resim görüntülenmesini sağlayabilirsiniz.

// İndirme ve Kurulum
* Öncelikle eklentiyi ysoz.php dosyasını indirin.
* İndirdiğiniz paketin içinden çıkan ysoz.php dosyasını sitenizin /wp-content/plugins/ dizinine yükleyin.
* Sitenizin Yönetim Paneli'nden, Eklentiler bölümünde Yakuter Rastgele Sözler eklentisini aktif hale getirin.
* Kurulum bu kadar. Artık Yönetim Paneli -> Eklentiler -> Rastgele Sözler bölümünden mevcut sözleri görebilir, bunları düzenleyebilir, silebilir ya da yeni söz girebilirsiniz.

// Kullanımı
Rastgele söz/resim vb. içeriğin temanızda görünmesini istediğiniz yere aşağıdaki kodu girerek kaydetmiş olduğunuz içeriğin rastgele görünmesini sağlayabilirsiniz.

<?php ysoz(); ?>

Sabit olarak bir sözü görüntülemek istiyorsanız sözün ID numarasını kodun içine ekleyiniz. Sözün ID numarasını yönetim panelinde Mevcut Sözler bölümünde ilgili sözün hemen solunda bulabilirsiniz. 

<?php ysoz('9'); ?>

// Güncelleme Notları
4.0 (11/07/2013)
* Wordpress 3.5 ile uyumlu hale getirildi.
* Yazı düzenleyici WordPress’in standart düzenleyicisine dönüştürüldü.
* Eklenti tasarımı WordPress yönetim paneli tasarımına uyduruldu.
3.0 (10/01/2009)
* Quicktag ve belirli bir sözü sabitleme özellikleri eklendi. Fonksiyonlar geliştirildi.
2.0 (20/09/2007)
* Türkçe karakter hatası giderildi.
1.0 (08/06/2006)
* İlk sürüm. Yeni sürüm WordPress’te Türkçe karakter hatası vermeye başlamıştı.

