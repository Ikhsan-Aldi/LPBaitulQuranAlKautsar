<?php

if (!function_exists('format_phone_number')) {
    /**
     * Format nomor telepon dengan spasi
     * Contoh: +6281234002350 -> +62 812 3400 2350
     */
    function format_phone_number($phone) {
        if (empty($phone)) return $phone;
        
        // Pastikan format sudah +62
        $phone = str_replace(' ', '', $phone);
        
        if (substr($phone, 0, 1) === '0') {
            $phone = '+62' . substr($phone, 1);
        } elseif (substr($phone, 0, 2) === '62') {
            $phone = '+' . $phone;
        } elseif (substr($phone, 0, 3) !== '+62') {
            $phone = '+62' . $phone;
        }
        
        // Format dengan spasi
        if (strlen($phone) === 14) { // +6281234002350
            return '+62 ' . substr($phone, 3, 3) . ' ' . substr($phone, 6, 4) . ' ' . substr($phone, 10, 4);
        } elseif (strlen($phone) === 15) { // +62812340023501
            return '+62 ' . substr($phone, 3, 3) . ' ' . substr($phone, 6, 4) . ' ' . substr($phone, 10, 5);
        }
        
        // Fallback: beri spasi setiap 4 digit setelah +62
        $formatted = substr($phone, 0, 3) . ' '; // +62
        $remaining = substr($phone, 3);
        
        // Pisahkan sisa nomor menjadi kelompok 4 digit
        $chunks = str_split($remaining, 4);
        $formatted .= implode(' ', $chunks);
        
        return $formatted;
    }
}