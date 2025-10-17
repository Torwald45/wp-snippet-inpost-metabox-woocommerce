# WP Snippet: InPost Metabox WooCommerce

> **🇬🇧 [Click here to read documentation in English](README.md)**

Rozszerza funkcjonalnosc wtyczki WooCommerce InPost przez dodanie dedykowanego metaboxa na stronie edycji zamowienia. Wyswietla informacje o wybranym paczkomacie w formacie latwo do skopiowania dla kierownikow sklepu.

## Funkcje

- Dedykowany metabox na stronie edycji zamowienia WooCommerce
- Wyswietla informacje o wybranym paczkomacie InPost
- Format latwy do skopiowania dla kierownikow sklepu
- Automatyczne wykrywanie wybranego paczkomatu
- Wsparcie dla WooCommerce HPOS (High-Performance Order Storage)
- Lekka implementacja oparta na jQuery

## Wymagania

- WordPress 5.0 lub nowszy
- WooCommerce 9.0 lub nowszy
- Wtyczka WooCommerce InPost (By WP Desk) 4.5+
- PHP 7.4 lub nowszy

## Instalacja

### Metoda 1: functions.php

1. Otworz plik functions.php swojego motywu
2. Skopiuj cala zawartosc z pliku inpost-metabox-woocommerce.php
3. Wklej na koncu pliku functions.php
4. Zapisz plik

### Metoda 2: Wtyczka Code Snippets

1. Zainstaluj i aktywuj wtyczke Code Snippets
2. Przejdz do Snippets - Add New
3. Skopiuj zawartosc z inpost-metabox-woocommerce.php BEZ otwierajacego tagu php
4. Wklej w pole Code
5. Aktywuj snippet

## Uzycie

Po instalacji:
1. Edytuj dowolne zamowienie WooCommerce ktore uzywa wysylki InPost
2. Znajdz metabox "InPost Parcel Locker Information"
3. Metabox wyswietli szczegoly wybranego paczkomatu
4. Informacje sa w formacie latwo do skopiowania

### Mozliwe stany metaboxa:
- Kod i nazwa paczkomatu (np. KRA01M)
- "No parcel locker selected" (jesli klient nie wybral)
- "This order does not use parcel locker" (jesli inna metoda wysylki)

## Szczegoly techniczne

### Metabox
- ID metaboxa: torwald45_inpost_metabox
- Tytul: InPost Parcel Locker Information
- Kontekst: normal
- Priorytet: default

### Elementy HTML
- Klasa kontenera: torwald45-inpost-metabox-content
- ID span z wynikiem: torwald45_inpost_selected_{order_id}

### Funkcje
- torwald45_inpost_add_metabox() - rejestruje metabox dla ekranow zamowien
- torwald45_inpost_render_metabox() - renderuje HTML metaboxa i jQuery
- torwald45_inpost_add_metabox_styles() - dodaje style CSS
- torwald45_inpost_add_screen_id() - dodaje kompatybilnosc screen ID WooCommerce

### Uzyte hooki
- add_meta_boxes (rejestracja metaboxa)
- admin_head (dodanie styli CSS)
- woocommerce_screen_ids (kompatybilnosc ekranow)

### Integracja
- Odczytuje dane z pol select wtyczki WooCommerce InPost
- Uzywa jQuery do wykrycia wybranego paczkomatu
- Dziala z dropdown Select2 (uzywany przez wtyczke InPost)

## Debugowanie

Snippet zawiera error_log() do debugowania:
- Komunikat w logu: "InPost metabox added to order"
- Lokalizacja: Linia 23 w kodzie

Aby wylaczyc logowanie, zakomentuj linie 23:
// error_log('InPost metabox added to order');

## Testowane z

- WooCommerce 9.2.3
- WooCommerce InPost 4.5.7 (By WP Desk)
- WordPress 6.0+

## Migracja z wersji v1.0.0

Migracja nie jest potrzebna - to funkcjonalnosc tylko do wyswietlania. Stary metabox zostanie automatycznie zastapiony po aktualizacji kodu.

## Historia zmian

Zobacz CHANGELOG.md dla historii wersji.

## Licencja

GPL v2 lub nowsza

## Autor

Torwald45
