**At the end of this guide, you should have this API endpoints available:**
* GET - /api/Artikel - Retrieve all Artikel

* GET - /api/Artikel?id=1 - Retrieve by id Artikel

* GET - api/Hama?kategori - Retrieve all Hama

* GET - /api/Hama?kategori=tebu - Retrieve by Hama


**In the Artikel and Hama, we have creating 1 endpoints:**


GET - http://localhost/panel/api/Artikel

GET - http://localhost/panel/api/Artikel?id=1

GET - http://localhost/panel/api/Hama?kategori

GET - http://localhost/panel/api/Hama?kategori=tebu




**Enpoints Format GET Data**

 - GET - http://localhost/panel/api/Artikel?id=1
 
        {
        "id": "", (int)
        "judul": "", (string)
        "isi": "", (string)
        "img": "", (string/url)
        "date_created": "" (date/string)
    }
        
 - GET - http://localhost/panel/api/Hama?kategori=tebu
 
        {
	        "id": "", (int)
            "nama_hama": "", (string)
            "deskipsi": "", (string)
            "penyelesaian_hama": "", (string)
            "rekom_pesti": "", (string)
            "gejala": "", (string)
            "kategori": "", (string)
            "img": "" (string/url)
        }