**Doorline**

**Kapı Kamera Sistemi**

**Amaç:**

Pratik engelli ya da yatalak insanların evin kapısı çaldığında ya da acil durumlarda (ambulans çağırmak gibi) uzaktan kontrol ile kapıyı açabileceği ve yardıma gelen kimseleri içeri alabileceği bir sistem kurmak amaçlanmıştır.

**Yazılım kurulumu:**

Raspberry Pi kamerasını kullanarak web tarayıcı üzerinde Streaming yapmak için [https://picamera.readthedocs.io/en/latest/recipes2.html#web-streaming](https://picamera.readthedocs.io/en/latest/recipes2.html#web-streaming) adresindeki program kodunu &quot;proje.py&quot; olarak Desktop dizininde oluşturun.

Raspberry her çalıştığında otomatik yapılması için uçbirimde aşağıdaki kodu çalışarak dosya düzenlenir: **sudo nano /etc/rc.local**

Açılan ekranda Exit 0&#39;dan önce Python kodumuzu çalıştıracak olan aşağıdaki kodu ekleyin: **sudo python3 /home/pi/Desktop/proje.py**

CRTL+O ile kaydedip CRTL+X ile çıkış yapabilirsiniz.

Program çalıştığında 127.0.0.1:8000 gibi IP adresinin 8000 nolu portu ile HTML bir arayüz karşılaşılır. Ayrıca sadece yayını almak için adresin sonuna **/stream.mjpg**  ekleyebilirsiniz.

Çalışmalarınızda IP adresi aramak için Raspbery Pi&#39;ye Hostname atayabilirsiniz. Bunun için uçbirimde **sudo raspi-config** (raspi-config önceden yüklenmiş olmalıdır. Raspbian için varsayılan yüklüdür) komutunu çalıştırarak Hostname kısmını değiştirmelisiniz, biz örnek için **zek** kelimesini tercih ettik.

Bu şekilde IP aramaksızın aynı ağa bağlı diğer cihazlardan [http://zek:8000/stream.mjpg](http://zek:8000/stream.mjpg) yazarak aynı sayfaya erişebilirsiniz. Ancak Mobil Erişim Noktası kullanıyorsanız Router görevi gören cihaz için bu özellik çalışmaz, bu yüzden Modem ile çalışmanızı tavsiye ederim.

Tüm cihazlardan rahatça ulaşılabilmesi için Web ara yüzünü tercih ettiğimiz için Raspbery Pi&#39;yi bir sunucu yapmalı ve bunun için Apache2 kurmalıyız ayrıca GPIO pinlerini kontrol edebilmek için PHP kurulumu yapılmalıdır.

Apache2 ve PHP için güncellemeleri yaptıktan sonra **sudo apt-get install apache2 php** kullanabilirsiniz. Projemiz için WiringPi gereklidir ve varsayılan olarak Raspbian üzerinde kurulu olsa da kaldırıp yeniden kurulmalıdır. Yeniden kurulum ve başka bir sistemlerde kullanabilmek için [http://wiringpi.com/download-and-install/](http://wiringpi.com/download-and-install/) adresindeki yönlendirmeler ile kurabilirsiniz.

Kurumlum sonrası **/var/www/html** dosyası artık bir sunucu hizmeti gibi davranacaktır. İçindeki **index.html** dosyasını silip yerine kodumuzdaki gibi **index.php** dosyasını ve script klasörünü yüklemeniz gerekiyor.

PHP ile GPIO kullanımı için [http://www.raspberry-pi-geek.com/Archive/2014/07/PHP-on-Raspberry-Pi](http://www.raspberry-pi-geek.com/Archive/2014/07/PHP-on-Raspberry-Pi) bağlantısından yararlanabilirsiniz.

Önceden oluşturduğumuz stream.mjpg akışı bu index.php içerisine bazı PHP fonksiyonları ([https://www.aucyberclub.org/blog/2017/03/24/phpilewebdelocalvepublicip.html](https://www.aucyberclub.org/blog/2017/03/24/phpilewebdelocalvepublicip.html)) sayesinde IP adresi de tespit edilerek eklenmiş ve GPIO komutları form metodu ile kullanılmıştır.

Şimdi diğer cihazlardan birinde [http://zek/](http://zek/) yazarak oluşturmuş olduğumuz index.php sitesine ulaşabilir ve video akışını görebiliriz. Ekrandaki &#39;Kapıyı Aç&#39; butonu da basarak ilgili pinin durumu değişir ve kapı sistemini tetikleyerek açılmasını sağlar.

Ayrıca kolaylık olması için Android uygulamalarda ilgili sayfa uygulamaya gömülerek kullanım ergonomisi artırılabilir.

**Youtube Linki:** https://youtu.be/V6CnHMQy02k
