# PRZEDSZKOLE

#Glownym celem tego projektu jest stworzenie systemu obslugi Przedszkola.

Jak to działa:

1. Główny plik /wew/klasy.php
  - rysowanie (dzieci, pracownicy, grupy)
    są to klasy odpowiedzialne za komunikaty, sprawdzanie, i rysowanie html
  - zapytania (dzieci, pracownicy, grupy)
    klasy do komunikacji z mysql
2. Sa trzy pliki główne: dzieci, pracownicy, grupy  .php z głównym kode html
3. W kazdym pliku jest formularz ukryty do dodawania:
  -  /js/ ....j.js plik z java czyli to co dzieje się po stronie klienta
  -  /wew/ ...p.php pliki do komunikacji javy z sewerem, służą do wywoływania obiektów z klas.
