DiLy Project

Setup: trebuie sa aveti instalat XAMPP cu PHP 7.1 (important!)

Pentru a porni serverul, rulati "start_server.bat"

Lucrati fiecare pe branch-ul lui, plz

Structura: fisierele "html" le gasiti in folderul "resources/views".
Au la final ".blade.php" dar de fapt sunt HMTL si puteti scrie
            cod HTML cum doriti acolo.

Fisierele css si javascript aferente paginilor de mai sus le gasiti in "public/css(sau js)"

In fisierele .blade.php css-urile se includ la inceput, iar fisierele JS la final. Puteti sa va uitati in login/home/memories ca sa vedeti exact cum.
IMPORTANT: Inainte de a include un css (pentru Bootstrap) sau un JS (pentru JQuery, de exemplu) verificati header.blade.php din folderul includes. El va aparea intotdeuana pe site, deci va avea inclus deja Bootstrap CSS/JS + JQuery si alte chestii.

Spor!