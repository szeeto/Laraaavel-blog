<?php
$p = "Welcome to Laravel";
?>
<x-halaman-layout :title="$p">
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Velit, tempore.</p>
    <x-slot name="tanggal">17 Aug 10000</x-slot>
    <x-slot name="penulis">Christoper Collombus</x-slot>
</x-halaman-layout>
