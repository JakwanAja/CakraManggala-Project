@extends('layouts.app')

@section('title', 'Bergabung - UKM Cakra Manggala')
@section('body_class', 'page-join')

@php
    $jurusanOptions = ['Teknik', 'Akuntansi', 'Administrasi Bisnis'];
    $steps = [
        1 => ['label' => 'Profil', 'meta' => 'Kenalan lebih dulu'],
        2 => ['label' => 'Akademik', 'meta' => 'Kampus dan kontak'],
        3 => ['label' => 'Motivasi', 'meta' => 'Cerita singkat'],
        4 => ['label' => 'Final', 'meta' => 'Upload dan kirim'],
    ];
@endphp

@push('styles')
<style>
    .page-join {
        background:
            radial-gradient(circle at top left, rgba(242, 182, 97, 0.22), transparent 28%),
            radial-gradient(circle at bottom right, rgba(26, 67, 49, 0.12), transparent 30%),
            linear-gradient(180deg, #f3efe7 0%, #ece5d8 48%, #e7dfd2 100%);
    }

    .join-section {
        position: relative;
        padding: clamp(2.5rem, 5vw, 4.25rem) 0 5rem;
        overflow: hidden;
    }

    .join-section::before,
    .join-section::after {
        content: '';
        position: absolute;
        inset: auto;
        pointer-events: none;
    }

    .join-section::before {
        top: 4rem;
        right: -6rem;
        width: 18rem;
        height: 18rem;
        border: 1px solid rgba(26, 67, 49, 0.1);
        transform: rotate(18deg);
    }

    .join-section::after {
        left: -7rem;
        bottom: 5rem;
        width: 16rem;
        height: 16rem;
        background: linear-gradient(135deg, rgba(26, 67, 49, 0.12), rgba(242, 182, 97, 0.04));
        transform: rotate(-22deg);
    }

    .join-shell {
        position: relative;
        z-index: 1;
        display: grid;
        grid-template-columns: minmax(290px, 0.92fr) minmax(0, 1.28fr);
        gap: 1.2rem;
        align-items: start;
    }

    .join-aside,
    .join-main {
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(7, 17, 12, 0.08);
        box-shadow: 0 24px 70px rgba(7, 17, 12, 0.12);
    }

    .join-aside {
        position: sticky;
        top: 6.75rem;
        padding: 1.6rem;
        background:
            linear-gradient(180deg, rgba(11, 23, 17, 0.96) 0%, rgba(23, 57, 42, 0.93) 100%);
        color: #fff;
    }

    .join-aside::before {
        content: '';
        position: absolute;
        inset: 0;
        background:
            radial-gradient(circle at top right, rgba(242, 182, 97, 0.18), transparent 26%),
            linear-gradient(135deg, transparent 0%, rgba(255, 255, 255, 0.04) 100%);
        pointer-events: none;
    }

    .join-main {
        padding: clamp(1.25rem, 3vw, 2rem);
        background: rgba(255, 252, 247, 0.86);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
    }

    .join-kicker {
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        padding: 0.58rem 0.78rem;
        border-radius: 0;
        background: rgba(242, 182, 97, 0.16);
        color: #f7d29d;
        font-family: 'Montserrat', sans-serif;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.16em;
        text-transform: uppercase;
    }

    .join-kicker--light {
        background: rgba(26, 67, 49, 0.08);
        color: var(--secondary-color);
    }

    .join-aside__title {
        position: relative;
        z-index: 1;
        margin: 1rem 0 0.85rem;
        font-size: clamp(2rem, 4vw, 2.8rem);
        line-height: 0.95;
        text-transform: uppercase;
    }

    .join-aside__copy,
    .join-note li,
    .join-live-row span:last-child {
        position: relative;
        z-index: 1;
        color: rgba(255, 255, 255, 0.76);
        line-height: 1.75;
    }

    .join-chip-list {
        position: relative;
        z-index: 1;
        display: flex;
        gap: 0.65rem;
        flex-wrap: wrap;
        margin: 1.25rem 0 1.5rem;
    }

    .join-chip {
        padding: 0.55rem 0.72rem;
        border-radius: 0;
        border: 1px solid rgba(255, 255, 255, 0.12);
        background: rgba(255, 255, 255, 0.04);
        font-size: 0.8rem;
        color: rgba(255, 255, 255, 0.84);
    }

    .join-step-list {
        position: relative;
        z-index: 1;
        display: grid;
        gap: 0.7rem;
        margin-bottom: 1.35rem;
    }

    .join-step {
        display: grid;
        grid-template-columns: auto 1fr auto;
        align-items: center;
        gap: 0.85rem;
        width: 100%;
        padding: 0.9rem 0.95rem;
        border-radius: 0;
        border: 1px solid rgba(255, 255, 255, 0.08);
        background: rgba(255, 255, 255, 0.03);
        color: inherit;
        text-align: left;
        transition: border-color 0.25s ease, transform 0.25s ease, background 0.25s ease;
    }

    .join-step:not(:disabled) {
        cursor: pointer;
    }

    .join-step:disabled {
        opacity: 0.74;
        cursor: default;
    }

    .join-step.is-active {
        border-color: rgba(242, 182, 97, 0.46);
        background: rgba(242, 182, 97, 0.12);
        transform: translateX(4px);
    }

    .join-step.is-complete {
        border-color: rgba(95, 167, 122, 0.36);
        background: rgba(95, 167, 122, 0.12);
    }

    .join-step__index {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 2.75rem;
        height: 2.75rem;
        border-radius: 0;
        border: 1px solid rgba(255, 255, 255, 0.16);
        font-family: 'Montserrat', sans-serif;
        font-size: 0.82rem;
        font-weight: 700;
        color: rgba(255, 255, 255, 0.76);
    }

    .join-step.is-active .join-step__index,
    .join-step.is-complete .join-step__index {
        border-color: transparent;
        background: linear-gradient(135deg, #f2c57b 0%, #de9541 100%);
        color: #15120d;
    }

    .join-step__copy strong,
    .join-note__title,
    .join-live-card__label {
        display: block;
        font-family: 'Montserrat', sans-serif;
        font-size: 0.82rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .join-step__copy small {
        display: block;
        margin-top: 0.2rem;
        color: rgba(255, 255, 255, 0.62);
        font-size: 0.8rem;
        letter-spacing: 0.01em;
    }

    .join-step__check {
        color: rgba(255, 255, 255, 0.32);
        font-size: 1rem;
    }

    .join-step.is-active .join-step__check,
    .join-step.is-complete .join-step__check {
        color: #f2c57b;
    }

    .join-note,
    .join-live-card {
        position: relative;
        z-index: 1;
        padding: 1rem;
        border-radius: 0;
        border: 1px solid rgba(255, 255, 255, 0.08);
        background: rgba(255, 255, 255, 0.04);
    }

    .join-note {
        margin-bottom: 1rem;
    }

    .join-note ul {
        margin: 0.75rem 0 0;
        padding-left: 1rem;
    }

    .join-live-card {
        display: grid;
        gap: 0.8rem;
    }

    .join-live-row {
        display: grid;
        gap: 0.18rem;
    }

    .join-live-row span:first-child,
    .join-review-card__label {
        font-size: 0.74rem;
        font-weight: 700;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        color: rgba(255, 255, 255, 0.44);
    }

    .join-main__header {
        display: grid;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .join-intro {
        position: relative;
        z-index: 1;
        display: grid;
        gap: 1rem;
        margin-bottom: 1.35rem;
    }

    .join-intro__stats {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 0.9rem;
    }

    .join-intro__stat {
        padding: 1rem;
        border: 1px solid rgba(18, 33, 25, 0.08);
        background: rgba(255, 252, 247, 0.7);
        box-shadow: 0 18px 44px rgba(7, 17, 12, 0.08);
    }

    .join-intro__label {
        display: block;
        margin-bottom: 0.35rem;
        font-family: 'Montserrat', sans-serif;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: var(--secondary-color);
    }

    .join-intro__value {
        display: block;
        color: var(--primary-color);
        font-size: 1.05rem;
        font-weight: 700;
        line-height: 1.45;
    }

    .join-main__headline {
        display: grid;
        gap: 0.65rem;
    }

    .join-main__headline h1 {
        margin: 0;
        font-size: clamp(2rem, 4vw, 3.25rem);
        line-height: 0.95;
        text-transform: uppercase;
        color: var(--primary-color);
    }

    .join-main__headline p {
        max-width: 56rem;
        margin: 0;
        color: #4f5d54;
        line-height: 1.8;
    }

    .join-alert {
        padding: 1rem 1.1rem;
        border: 1px solid rgba(181, 67, 45, 0.16);
        background: rgba(255, 241, 238, 0.92);
        color: #6e2b1d;
    }

    .join-alert__title {
        margin-bottom: 0.55rem;
        font-family: 'Montserrat', sans-serif;
        font-size: 0.86rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .join-error-list {
        margin: 0;
        padding-left: 1rem;
    }

    .join-progress-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.8rem;
        font-size: 0.88rem;
        color: #5a665f;
    }

    .join-progress {
        position: relative;
        height: 0.45rem;
        background: rgba(26, 67, 49, 0.08);
        overflow: hidden;
    }

    .join-progress__bar {
        position: absolute;
        inset: 0 auto 0 0;
        width: 25%;
        background: linear-gradient(90deg, #255b44 0%, #f2b661 100%);
        transition: width 0.28s ease;
    }

    .join-form {
        display: grid;
        gap: 1.5rem;
    }

    .join-panel {
        display: none;
        padding: 1.35rem;
        border-radius: 0;
        border: 1px solid rgba(18, 33, 25, 0.08);
        background: rgba(255, 255, 255, 0.7);
        animation: joinFadeIn 0.28s ease;
    }

    .join-panel.is-active {
        display: block;
    }

    .join-panel__header {
        display: grid;
        gap: 0.6rem;
        margin-bottom: 1.25rem;
    }

    .join-panel__eyebrow {
        font-family: 'Montserrat', sans-serif;
        font-size: 0.74rem;
        font-weight: 700;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: var(--secondary-color);
    }

    .join-panel__title {
        margin: 0;
        font-size: clamp(1.3rem, 2.4vw, 1.7rem);
        color: var(--primary-color);
    }

    .join-panel__desc {
        max-width: 50rem;
        margin: 0;
        color: #5b675f;
        line-height: 1.75;
    }

    .join-field-grid,
    .join-highlight-grid,
    .join-review-grid {
        display: grid;
        gap: 1rem;
    }

    .join-field-grid {
        grid-template-columns: repeat(12, minmax(0, 1fr));
    }

    .join-field {
        display: grid;
        gap: 0.55rem;
    }

    .join-field--span-6 {
        grid-column: span 6;
    }

    .join-field--span-12 {
        grid-column: span 12;
    }

    .join-field label,
    .join-consent {
        color: var(--dark-color);
        font-weight: 700;
    }

    .join-field label {
        font-family: 'Montserrat', sans-serif;
        font-size: 0.85rem;
        letter-spacing: 0.05em;
        text-transform: uppercase;
    }

    .join-required {
        color: #b42318;
    }

    .join-input,
    .join-select,
    .join-textarea {
        width: 100%;
        min-height: 3.35rem;
        padding: 0.9rem 1rem;
        border-radius: 0;
        border: 1px solid rgba(18, 33, 25, 0.14);
        background: rgba(255, 255, 255, 0.9);
        color: var(--text-color);
        transition: border-color 0.24s ease, box-shadow 0.24s ease, background 0.24s ease;
    }

    .join-textarea {
        min-height: 9rem;
        resize: vertical;
    }

    .join-input:focus,
    .join-select:focus,
    .join-textarea:focus {
        border-color: rgba(37, 91, 68, 0.68);
        box-shadow: 0 0 0 4px rgba(37, 91, 68, 0.12);
        background: #fff;
        outline: none;
    }

    .join-input.is-invalid,
    .join-select.is-invalid,
    .join-textarea.is-invalid {
        border-color: rgba(180, 35, 24, 0.52);
    }

    .join-helper,
    .join-inline-helper,
    .join-text-counter,
    .join-upload__meta span,
    .join-review-card__value--muted {
        color: #5d675f;
        font-size: 0.86rem;
        line-height: 1.65;
    }

    .join-inline-helper {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.85rem;
        flex-wrap: wrap;
    }

    .join-age-pill {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        padding: 0.28rem 0.55rem;
        border-radius: 0;
        background: rgba(26, 67, 49, 0.08);
        color: var(--secondary-color);
        font-weight: 600;
    }

    .invalid-feedback {
        display: block;
        color: #b42318;
        font-size: 0.84rem;
    }

    .join-highlight-grid,
    .join-review-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

    .join-highlight,
    .join-review-card,
    .join-upload {
        border-radius: 0;
        border: 1px solid rgba(18, 33, 25, 0.08);
        background: rgba(252, 249, 242, 0.88);
    }

    .join-highlight {
        padding: 1rem;
    }

    .join-highlight__title {
        margin-bottom: 0.5rem;
        font-family: 'Montserrat', sans-serif;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        color: var(--primary-color);
    }

    .join-highlight p,
    .join-review-card__value {
        margin: 0;
        color: #46534c;
        line-height: 1.7;
    }

    .join-upload {
        padding: 1rem;
    }

    .join-upload__preview {
        display: grid;
        grid-template-columns: 92px 1fr;
        gap: 0.9rem;
        align-items: center;
        margin-top: 1rem;
        padding: 0.8rem;
        border-radius: 0;
        border: 1px solid rgba(18, 33, 25, 0.08);
        background: rgba(255, 255, 255, 0.92);
    }

    .join-upload__preview img {
        width: 92px;
        height: 112px;
        object-fit: cover;
        background: #e4e0d9;
    }

    .join-upload__meta strong {
        display: block;
        margin-bottom: 0.2rem;
        color: var(--primary-color);
    }

    .join-upload__empty {
        margin-top: 1rem;
        padding: 1rem;
        border-radius: 0;
        border: 1px dashed rgba(18, 33, 25, 0.16);
        background: rgba(26, 67, 49, 0.03);
        color: #59665f;
    }

    .join-upload__empty i {
        margin-right: 0.45rem;
        color: var(--secondary-color);
    }

    .join-review-card {
        padding: 1rem;
    }

    .join-review-card__label {
        color: #78847d;
    }

    .join-review-card__value {
        margin-top: 0.45rem;
        color: var(--primary-color);
        font-weight: 700;
    }

    .join-consent-wrap {
        display: grid;
        gap: 0.85rem;
        margin-top: 1.2rem;
    }

    .join-consent {
        display: flex;
        align-items: flex-start;
        gap: 0.75rem;
        padding: 1rem;
        border-radius: 0;
        border: 1px solid rgba(18, 33, 25, 0.08);
        background: rgba(255, 255, 255, 0.85);
    }

    .join-consent input {
        margin-top: 0.2rem;
    }

    .join-widget {
        min-height: 78px;
    }

    .join-recaptcha-error {
        display: none;
        color: #b42318;
        font-size: 0.84rem;
    }

    .join-recaptcha-error.is-visible {
        display: block;
    }

    .join-navigation {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        padding-top: 1.1rem;
        border-top: 1px solid rgba(18, 33, 25, 0.08);
    }

    .join-navigation__copy {
        color: #5b675f;
        font-size: 0.9rem;
    }

    .join-navigation__actions {
        display: flex;
        gap: 0.75rem;
        align-items: center;
        margin-left: auto;
    }

    .join-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.7rem;
        min-height: 3.2rem;
        padding: 0.85rem 1.25rem;
        border-radius: 0;
        border: 1px solid transparent;
        font-family: 'Montserrat', sans-serif;
        font-size: 0.82rem;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        transition: transform 0.24s ease, border-color 0.24s ease, background 0.24s ease, color 0.24s ease;
    }

    .join-btn:hover,
    .join-btn:focus-visible {
        transform: translateY(-1px);
    }

    .join-btn--ghost {
        border-color: rgba(18, 33, 25, 0.12);
        background: rgba(255, 255, 255, 0.78);
        color: var(--primary-color);
    }

    .join-btn--primary {
        border-color: rgba(242, 182, 97, 0.7);
        background: linear-gradient(135deg, #f2c57b 0%, #de9541 100%);
        color: #15120d;
        box-shadow: 0 18px 35px rgba(222, 149, 65, 0.24);
    }

    .join-btn:disabled {
        opacity: 0.58;
        cursor: default;
        transform: none;
        box-shadow: none;
    }

    .join-btn[hidden] {
        display: none !important;
    }

    @keyframes joinFadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 1199px) {
        .join-shell {
            grid-template-columns: minmax(260px, 0.88fr) minmax(0, 1.12fr);
        }
    }

    @media (max-width: 991px) {
        .join-shell {
            grid-template-columns: 1fr;
        }

        .join-aside {
            position: static;
        }
    }

    @media (max-width: 767px) {
        .join-panel,
        .join-aside,
        .join-main {
            padding: 1rem;
        }

        .join-field--span-6,
        .join-field--span-12 {
            grid-column: auto;
        }

        .join-highlight-grid,
        .join-review-grid {
            grid-template-columns: 1fr;
        }

        .join-field-grid {
            grid-template-columns: 1fr;
        }

        .join-intro__stats {
            grid-template-columns: 1fr;
        }

        .join-upload__preview {
            grid-template-columns: 1fr;
        }

        .join-navigation {
            flex-direction: column;
            align-items: stretch;
        }

        .join-navigation__actions {
            width: 100%;
            margin-left: 0;
            flex-direction: column-reverse;
        }

        .join-btn {
            width: 100%;
        }
    }
</style>
@endpush

@section('content')
<section class="join-section">
    <div class="container">
        <div class="join-intro" data-aos="fade-up">
            <div class="section-intro mb-0">
                <span class="section-kicker">
                    <i class="bi bi-person-plus-fill"></i>
                    Bergabung
                </span>
                <h1 class="section-heading">Pendaftaran dibuat lebih jelas dan lebih ringan</h1>
                <p class="section-lead mx-auto">
                    Halaman ini mempertahankan alur bertahap yang sudah bagus, lalu diperkuat dengan hierarchy visual yang lebih rapi agar pengalaman isi formulir tetap nyaman.
                </p>
            </div>
            <div class="join-intro__stats">
                <div class="join-intro__stat">
                    <span class="join-intro__label">Estimasi</span>
                    <span class="join-intro__value">3-5 menit pengisian</span>
                </div>
                <div class="join-intro__stat">
                    <span class="join-intro__label">Tahapan</span>
                    <span class="join-intro__value">4 langkah dengan progres jelas</span>
                </div>
                <div class="join-intro__stat">
                    <span class="join-intro__label">Keunggulan</span>
                    <span class="join-intro__value">Bisa cek ulang sebelum formulir dikirim</span>
                </div>
            </div>
        </div>

        <div class="join-shell" data-join-app>
            <aside class="join-aside" data-aos="fade-right">
                <span class="join-kicker">Pendaftaran Angkatan XIV</span>
                <h1 class="join-aside__title">Gabung dengan Cakra Manggala.</h1>
                <p class="join-aside__copy">
                    Formulir dibuat bertahap supaya lebih cepat diisi, lebih enak dibaca, dan tetap nyaman dipakai dari laptop maupun HP.
                </p>

                <div class="join-chip-list">
                    <span class="join-chip">Estimasi 3-5 menit</span>
                    <span class="join-chip">4 langkah ringkas</span>
                    <span class="join-chip">Bisa cek ulang sebelum kirim</span>
                </div>

                <div class="join-step-list" aria-label="Tahapan pendaftaran">
                    @foreach($steps as $index => $step)
                        <button
                            type="button"
                            class="join-step {{ $index === 1 ? 'is-active' : '' }}"
                            data-step-target="{{ $index }}"
                            aria-current="{{ $index === 1 ? 'step' : 'false' }}"
                            {{ $index > 1 ? 'disabled' : '' }}
                        >
                            <span class="join-step__index">{{ str_pad((string) $index, 2, '0', STR_PAD_LEFT) }}</span>
                            <span class="join-step__copy">
                                <strong>{{ $step['label'] }}</strong>
                                <small>{{ $step['meta'] }}</small>
                            </span>
                            <i class="bi bi-check2 join-step__check" aria-hidden="true"></i>
                        </button>
                    @endforeach
                </div>

                <div class="join-note">
                    <div class="join-note__title">Siapkan sebelum lanjut</div>
                    <ul>
                        <li>NIM aktif dan program studi terbaru.</li>
                        <li>Nomor WhatsApp yang benar-benar bisa dihubungi.</li>
                        <li>Foto diri JPG atau PNG dengan ukuran maksimal 2MB.</li>
                    </ul>
                </div>

                <div class="join-live-card">
                    <span class="join-live-card__label">Ringkasan Cepat</span>
                    <div class="join-live-row">
                        <span>Nama</span>
                        <span data-summary-name>Nama belum diisi</span>
                    </div>
                    <div class="join-live-row">
                        <span>Akademik</span>
                        <span data-summary-academic>Jurusan dan prodi belum diisi</span>
                    </div>
                    <div class="join-live-row">
                        <span>Kontak</span>
                        <span data-summary-contact>Nomor aktif belum diisi</span>
                    </div>
                    <div class="join-live-row">
                        <span>Motivasi</span>
                        <span data-summary-motivation>Ceritakan singkat alasan kamu bergabung.</span>
                    </div>
                    <div class="join-live-row">
                        <span>Foto</span>
                        <span data-summary-photo>Belum ada file dipilih</span>
                    </div>
                </div>
            </aside>

            <div class="join-main" data-aos="fade-up">
                <div class="join-main__header">
                    <span class="join-kicker join-kicker--light">Form Calon Anggota</span>
                    <div class="join-main__headline">
                        <h1>Isi bertahap, cek ulang, lalu kirim.</h1>
                        <p>
                            Setiap langkah hanya menampilkan input yang relevan. Kamu bisa kembali ke langkah sebelumnya kapan saja sebelum formulir dikirim.
                        </p>
                    </div>

                    @if($errors->any())
                        <div class="join-alert">
                            <div class="join-alert__title">Masih ada data yang perlu diperbaiki</div>
                            <ul class="join-error-list">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div>
                        <div class="join-progress-meta" aria-live="polite">
                            <span data-progress-label>Langkah 1 dari 4</span>
                            <span data-progress-value>25% selesai</span>
                        </div>
                        <div class="join-progress" aria-hidden="true">
                            <span class="join-progress__bar" data-progress-bar></span>
                        </div>
                    </div>
                </div>

                <form
                    id="joinForm"
                    class="join-form"
                    action="{{ route('join.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    novalidate
                >
                    @csrf

                    <section class="join-panel is-active" data-step-panel="1">
                        <div class="join-panel__header">
                            <div class="join-panel__eyebrow">Langkah 1</div>
                            <h2 class="join-panel__title">Profil Diri</h2>
                            <p class="join-panel__desc">
                                Mulai dari identitas dasar agar panitia mudah mencocokkan data calon anggota dengan cepat.
                            </p>
                        </div>

                        <div class="join-field-grid">
                            <div class="join-field join-field--span-6">
                                <label for="nama_lengkap">Nama lengkap <span class="join-required">*</span></label>
                                <input
                                    type="text"
                                    class="join-input @error('nama_lengkap') is-invalid @enderror"
                                    id="nama_lengkap"
                                    name="nama_lengkap"
                                    value="{{ old('nama_lengkap') }}"
                                    placeholder="Nama sesuai identitas kampus"
                                    autocomplete="name"
                                    maxlength="255"
                                    required
                                >
                                @error('nama_lengkap')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="join-field join-field--span-6">
                                <label for="jenis_kelamin">Jenis kelamin <span class="join-required">*</span></label>
                                <select
                                    class="join-select @error('jenis_kelamin') is-invalid @enderror"
                                    id="jenis_kelamin"
                                    name="jenis_kelamin"
                                    required
                                >
                                    <option value="">Pilih jenis kelamin</option>
                                    <option value="Laki-laki" {{ old('jenis_kelamin') === 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin') === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="join-field join-field--span-6">
                                <label for="tempat_lahir">Tempat lahir <span class="join-required">*</span></label>
                                <input
                                    type="text"
                                    class="join-input @error('tempat_lahir') is-invalid @enderror"
                                    id="tempat_lahir"
                                    name="tempat_lahir"
                                    value="{{ old('tempat_lahir') }}"
                                    placeholder="Contoh: Madiun"
                                    maxlength="255"
                                    required
                                >
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="join-field join-field--span-6">
                                <label for="tanggal_lahir">Tanggal lahir <span class="join-required">*</span></label>
                                <input
                                    type="date"
                                    class="join-input @error('tanggal_lahir') is-invalid @enderror"
                                    id="tanggal_lahir"
                                    name="tanggal_lahir"
                                    value="{{ old('tanggal_lahir') }}"
                                    max="{{ now()->subDay()->format('Y-m-d') }}"
                                    required
                                >
                                <div class="join-inline-helper">
                                    <span class="join-helper">Gunakan tanggal lahir yang sesuai data resmi.</span>
                                    <span class="join-age-pill" data-age-preview>Usia akan muncul di sini</span>
                                </div>
                                @error('tanggal_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </section>

                    <section class="join-panel" data-step-panel="2">
                        <div class="join-panel__header">
                            <div class="join-panel__eyebrow">Langkah 2</div>
                            <h2 class="join-panel__title">Data Akademik dan Kontak</h2>
                            <p class="join-panel__desc">
                                Bagian ini dipakai untuk identifikasi kampus dan komunikasi lanjutan setelah formulir masuk.
                            </p>
                        </div>

                        <div class="join-field-grid">
                            <div class="join-field join-field--span-6">
                                <label for="nim">NIM <span class="join-required">*</span></label>
                                <input
                                    type="text"
                                    class="join-input @error('nim') is-invalid @enderror"
                                    id="nim"
                                    name="nim"
                                    value="{{ old('nim') }}"
                                    placeholder="Masukkan NIM aktif"
                                    inputmode="numeric"
                                    maxlength="20"
                                    required
                                >
                                @error('nim')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="join-field join-field--span-6">
                                <label for="jurusan">Jurusan <span class="join-required">*</span></label>
                                <select
                                    class="join-select @error('jurusan') is-invalid @enderror"
                                    id="jurusan"
                                    name="jurusan"
                                    required
                                >
                                    <option value="">Pilih jurusan</option>
                                    @foreach($jurusanOptions as $jurusan)
                                        <option value="{{ $jurusan }}" {{ old('jurusan') === $jurusan ? 'selected' : '' }}>
                                            {{ $jurusan }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('jurusan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="join-field join-field--span-6">
                                <label for="program_studi">Program studi <span class="join-required">*</span></label>
                                <input
                                    type="text"
                                    class="join-input @error('program_studi') is-invalid @enderror"
                                    id="program_studi"
                                    name="program_studi"
                                    value="{{ old('program_studi') }}"
                                    placeholder="Contoh: Teknologi Rekayasa Komputer"
                                    maxlength="255"
                                    required
                                >
                                @error('program_studi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="join-field join-field--span-6">
                                <label for="no_hp">No. HP / WhatsApp <span class="join-required">*</span></label>
                                <input
                                    type="text"
                                    class="join-input @error('no_hp') is-invalid @enderror"
                                    id="no_hp"
                                    name="no_hp"
                                    value="{{ old('no_hp') }}"
                                    placeholder="Nomor aktif yang bisa dihubungi"
                                    inputmode="tel"
                                    maxlength="20"
                                    autocomplete="tel"
                                    required
                                >
                                <div class="join-helper">Pastikan nomor aktif untuk info seleksi, briefing, dan pengumuman.</div>
                                @error('no_hp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="join-field join-field--span-12">
                                <label for="alamat">Alamat lengkap <span class="join-required">*</span></label>
                                <textarea
                                    class="join-textarea @error('alamat') is-invalid @enderror"
                                    id="alamat"
                                    name="alamat"
                                    rows="4"
                                    placeholder="Tuliskan alamat lengkap yang mudah dikenali"
                                    required
                                >{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </section>

                    <section class="join-panel" data-step-panel="3">
                        <div class="join-panel__header">
                            <div class="join-panel__eyebrow">Langkah 3</div>
                            <h2 class="join-panel__title">Motivasi dan Pengalaman</h2>
                            <p class="join-panel__desc">
                                Ceritakan singkat latar belakang dan alasanmu. Jawaban ini membantu panitia memahami minat dan kesiapanmu.
                            </p>
                        </div>

                        <div class="join-highlight-grid">
                            <article class="join-highlight">
                                <div class="join-highlight__title">Yang bisa diceritakan</div>
                                <p>Pengalaman organisasi, kegiatan lapangan, kepanitiaan, atau komunitas yang pernah kamu ikuti.</p>
                            </article>
                            <article class="join-highlight">
                                <div class="join-highlight__title">Fokus jawaban</div>
                                <p>Ceritakan motivasi yang jujur: apa yang ingin kamu pelajari, kontribusi yang ingin kamu bawa, dan alasan memilih Cakra Manggala.</p>
                            </article>
                        </div>

                        <div class="join-field-grid">
                            <div class="join-field join-field--span-12">
                                <label for="organisasi_yang_pernah_diikuti">Organisasi yang pernah diikuti</label>
                                <textarea
                                    class="join-textarea @error('organisasi_yang_pernah_diikuti') is-invalid @enderror"
                                    id="organisasi_yang_pernah_diikuti"
                                    name="organisasi_yang_pernah_diikuti"
                                    rows="4"
                                    placeholder="Opsional. Tulis organisasi, komunitas, atau kegiatan yang pernah kamu ikuti."
                                >{{ old('organisasi_yang_pernah_diikuti') }}</textarea>
                                <div class="join-helper">Kosongkan jika belum pernah mengikuti organisasi atau kegiatan serupa.</div>
                                @error('organisasi_yang_pernah_diikuti')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="join-field join-field--span-12">
                                <label for="alasan_bergabung">Alasan bergabung <span class="join-required">*</span></label>
                                <textarea
                                    class="join-textarea @error('alasan_bergabung') is-invalid @enderror"
                                    id="alasan_bergabung"
                                    name="alasan_bergabung"
                                    rows="5"
                                    placeholder="Ceritakan alasanmu bergabung, hal yang ingin dipelajari, dan kontribusi yang ingin kamu berikan."
                                    minlength="20"
                                    required
                                >{{ old('alasan_bergabung') }}</textarea>
                                <div class="join-inline-helper">
                                    <span class="join-helper">Minimal 20 karakter. Tulis padat dan jelas.</span>
                                    <span class="join-text-counter" data-alasan-counter>0 karakter</span>
                                </div>
                                @error('alasan_bergabung')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </section>

                    <section class="join-panel" data-step-panel="4">
                        <div class="join-panel__header">
                            <div class="join-panel__eyebrow">Langkah 4</div>
                            <h2 class="join-panel__title">Upload dan Konfirmasi</h2>
                            <p class="join-panel__desc">
                                Tinggal unggah foto diri, cek ringkasan datamu, lalu kirim formulir setelah verifikasi selesai.
                            </p>
                        </div>

                        <div class="join-upload">
                            <div class="join-field">
                                <label for="foto_diri">Foto diri <span class="join-required">*</span></label>
                                <input
                                    type="file"
                                    class="join-input @error('foto_diri') is-invalid @enderror"
                                    id="foto_diri"
                                    name="foto_diri"
                                    accept="image/jpeg,image/png,image/jpg"
                                    required
                                >
                                <div class="join-helper">
                                    Gunakan foto yang jelas, format JPG atau PNG, dan ukuran file maksimal 2MB.
                                </div>
                                @if($errors->has('foto_diri'))
                                    <div class="join-helper">
                                        Karena aturan browser, file perlu diunggah ulang setelah validasi gagal.
                                    </div>
                                @endif
                                @error('foto_diri')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="join-upload__empty" data-photo-empty>
                                <i class="bi bi-image"></i>Preview foto akan muncul di sini setelah file dipilih.
                            </div>

                            <div class="join-upload__preview" data-photo-preview hidden>
                                <img src="" alt="Preview foto diri" data-photo-image>
                                <div class="join-upload__meta">
                                    <strong data-photo-name>Belum ada file dipilih</strong>
                                    <span data-photo-size>Ukuran file akan tampil di sini.</span>
                                </div>
                            </div>
                        </div>

                        <div class="join-review-grid" style="margin-top: 1rem;">
                            <article class="join-review-card">
                                <span class="join-review-card__label">Nama</span>
                                <p class="join-review-card__value" data-summary-name>Nama belum diisi</p>
                            </article>
                            <article class="join-review-card">
                                <span class="join-review-card__label">Akademik</span>
                                <p class="join-review-card__value" data-summary-academic>Jurusan dan prodi belum diisi</p>
                            </article>
                            <article class="join-review-card">
                                <span class="join-review-card__label">Kontak</span>
                                <p class="join-review-card__value" data-summary-contact>Nomor aktif belum diisi</p>
                            </article>
                            <article class="join-review-card">
                                <span class="join-review-card__label">Motivasi</span>
                                <p class="join-review-card__value" data-summary-motivation>Ceritakan singkat alasan kamu bergabung.</p>
                            </article>
                        </div>

                        <div class="join-consent-wrap">
                            <label class="join-consent" for="konfirmasi_data">
                                <input type="checkbox" id="konfirmasi_data" name="konfirmasi_data" required>
                                <span>
                                    Saya memastikan data yang saya isi benar, dapat dipertanggungjawabkan, dan siap mengikuti proses selanjutnya jika dinyatakan lanjut.
                                </span>
                            </label>

                            @if(config('services.recaptcha.site_key'))
                                <div class="join-widget" id="joinRecaptcha"></div>
                            @else
                                <div class="join-helper">reCAPTCHA belum dikonfigurasi pada environment ini.</div>
                            @endif

                            <div class="join-recaptcha-error @error('g-recaptcha-response') is-visible @enderror" data-recaptcha-error>
                                {{ $errors->first('g-recaptcha-response') }}
                            </div>
                        </div>
                    </section>

                    <div class="join-navigation">
                        <div class="join-navigation__copy" data-step-caption>
                            Lengkapi langkah ini lalu lanjut ke tahap berikutnya.
                        </div>

                        <div class="join-navigation__actions">
                            <button type="button" class="join-btn join-btn--ghost" data-step-prev disabled>
                                <i class="bi bi-arrow-left"></i>
                                <span>Sebelumnya</span>
                            </button>
                            <button type="button" class="join-btn join-btn--ghost" data-step-next>
                                <span>Selanjutnya</span>
                                <i class="bi bi-arrow-right"></i>
                            </button>
                            <button type="submit" class="join-btn join-btn--primary" data-step-submit hidden id="submitBtn">
                                <i class="bi bi-send"></i>
                                <span>Kirim Pendaftaran</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    window.joinRecaptchaLoaded = false;
    window.onJoinRecaptchaLoad = function () {
        window.joinRecaptchaLoaded = true;
        window.dispatchEvent(new Event('join:recaptcha-ready'));
    };
</script>
<script src="https://www.google.com/recaptcha/api.js?onload=onJoinRecaptchaLoad&render=explicit" async defer></script>
<script>
    (() => {
        const app = document.querySelector('[data-join-app]');

        if (!app) {
            return;
        }

        const form = app.querySelector('#joinForm');
        const panels = Array.from(form.querySelectorAll('[data-step-panel]'));
        const stepButtons = Array.from(app.querySelectorAll('[data-step-target]'));
        const prevButton = form.querySelector('[data-step-prev]');
        const nextButton = form.querySelector('[data-step-next]');
        const submitButton = form.querySelector('[data-step-submit]');
        const progressLabel = app.querySelector('[data-progress-label]');
        const progressValue = app.querySelector('[data-progress-value]');
        const progressBar = app.querySelector('[data-progress-bar]');
        const caption = form.querySelector('[data-step-caption]');
        const totalSteps = panels.length;
        const errorFields = @json($errors->keys());
        const recaptchaSiteKey = @json(config('services.recaptcha.site_key'));
        const recaptchaContainer = document.getElementById('joinRecaptcha');
        const recaptchaError = app.querySelector('[data-recaptcha-error]');
        const photoInput = form.querySelector('#foto_diri');
        const photoPreview = app.querySelector('[data-photo-preview]');
        const photoImage = app.querySelector('[data-photo-image]');
        const photoEmpty = app.querySelector('[data-photo-empty]');
        const photoName = app.querySelector('[data-photo-name]');
        const photoSize = app.querySelector('[data-photo-size]');
        const alasanInput = form.querySelector('#alasan_bergabung');
        const alasanCounter = app.querySelector('[data-alasan-counter]');
        const tanggalLahirInput = form.querySelector('#tanggal_lahir');
        const agePreview = app.querySelector('[data-age-preview]');
        let currentStep = getInitialStep();
        let recaptchaWidgetId = null;

        const fieldStepMap = {
            nama_lengkap: 1,
            jenis_kelamin: 1,
            tempat_lahir: 1,
            tanggal_lahir: 1,
            nim: 2,
            jurusan: 2,
            program_studi: 2,
            no_hp: 2,
            alamat: 2,
            organisasi_yang_pernah_diikuti: 3,
            alasan_bergabung: 3,
            foto_diri: 4,
            konfirmasi_data: 4,
            'g-recaptcha-response': 4,
        };

        const summaryTargets = {
            name: Array.from(app.querySelectorAll('[data-summary-name]')),
            academic: Array.from(app.querySelectorAll('[data-summary-academic]')),
            contact: Array.from(app.querySelectorAll('[data-summary-contact]')),
            motivation: Array.from(app.querySelectorAll('[data-summary-motivation]')),
            photo: Array.from(app.querySelectorAll('[data-summary-photo]')),
        };

        function getInitialStep() {
            if (!errorFields.length) {
                return 1;
            }

            const mappedSteps = errorFields
                .map((field) => fieldStepMap[field] || 1)
                .sort((first, second) => first - second);

            return mappedSteps[0] || 1;
        }

        function setSummary(targetKey, value) {
            if (!summaryTargets[targetKey]) {
                return;
            }

            summaryTargets[targetKey].forEach((element) => {
                element.textContent = value;
            });
        }

        function truncate(text, limit = 96) {
            const normalized = (text || '').trim().replace(/\s+/g, ' ');

            if (!normalized) {
                return '';
            }

            if (normalized.length <= limit) {
                return normalized;
            }

            return normalized.slice(0, limit - 1).trim() + '...';
        }

        function updateSummary() {
            const nama = form.querySelector('#nama_lengkap')?.value.trim() || 'Nama belum diisi';
            const jurusan = form.querySelector('#jurusan')?.value.trim();
            const prodi = form.querySelector('#program_studi')?.value.trim();
            const nim = form.querySelector('#nim')?.value.trim();
            const noHp = form.querySelector('#no_hp')?.value.trim();
            const alasan = truncate(alasanInput?.value || '', 110);
            const fotoValue = photoInput?.files?.[0]?.name || 'Belum ada file dipilih';
            const academicParts = [jurusan, prodi, nim ? 'NIM ' + nim : ''].filter(Boolean);

            setSummary('name', nama);
            setSummary(
                'academic',
                academicParts.length ? academicParts.join(' / ') : 'Jurusan dan prodi belum diisi'
            );
            setSummary('contact', noHp ? 'WhatsApp ' + noHp : 'Nomor aktif belum diisi');
            setSummary(
                'motivation',
                alasan || 'Ceritakan singkat alasan kamu bergabung.'
            );
            setSummary('photo', fotoValue);
        }

        function updateAgePreview() {
            if (!tanggalLahirInput || !agePreview) {
                return;
            }

            if (!tanggalLahirInput.value) {
                agePreview.textContent = 'Usia akan muncul di sini';
                return;
            }

            const birthDate = new Date(tanggalLahirInput.value + 'T00:00:00');
            const today = new Date();
            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();
            const dayDiff = today.getDate() - birthDate.getDate();

            if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
                age -= 1;
            }

            if (Number.isNaN(age) || age < 0) {
                agePreview.textContent = 'Tanggal belum valid';
                return;
            }

            agePreview.textContent = 'Usia ' + age + ' tahun';
        }

        function updateAlasanCounter() {
            if (!alasanInput || !alasanCounter) {
                return;
            }

            const length = alasanInput.value.trim().length;
            alasanCounter.textContent = length + ' karakter';
        }

        function formatFileSize(bytes) {
            if (!bytes) {
                return 'Ukuran file akan tampil di sini.';
            }

            if (bytes >= 1024 * 1024) {
                return (bytes / (1024 * 1024)).toFixed(2) + ' MB';
            }

            return Math.round(bytes / 1024) + ' KB';
        }

        function updatePhotoPreview() {
            if (!photoInput || !photoPreview || !photoImage || !photoEmpty || !photoName || !photoSize) {
                return;
            }

            const file = photoInput.files && photoInput.files[0];

            if (!file) {
                photoPreview.hidden = true;
                photoEmpty.hidden = false;
                photoName.textContent = 'Belum ada file dipilih';
                photoSize.textContent = 'Ukuran file akan tampil di sini.';
                updateSummary();
                return;
            }

            photoPreview.hidden = false;
            photoEmpty.hidden = true;
            photoName.textContent = file.name;
            photoSize.textContent = formatFileSize(file.size);

            const reader = new FileReader();
            reader.onload = (event) => {
                photoImage.src = event.target?.result || '';
            };
            reader.readAsDataURL(file);

            updateSummary();
        }

        function clearRecaptchaError() {
            if (!recaptchaError) {
                return;
            }

            recaptchaError.textContent = '';
            recaptchaError.classList.remove('is-visible');
        }

        function showRecaptchaError(message) {
            if (!recaptchaError) {
                return;
            }

            recaptchaError.textContent = message;
            recaptchaError.classList.add('is-visible');
        }

        function renderRecaptcha() {
            if (!recaptchaSiteKey || !recaptchaContainer || recaptchaWidgetId !== null || currentStep !== totalSteps) {
                return;
            }

            if (!window.joinRecaptchaLoaded || typeof window.grecaptcha === 'undefined') {
                return;
            }

            recaptchaWidgetId = window.grecaptcha.render(recaptchaContainer, {
                sitekey: recaptchaSiteKey,
                callback: clearRecaptchaError,
                'expired-callback': () => showRecaptchaError('Verifikasi reCAPTCHA sudah kedaluwarsa. Silakan ulangi.'),
                'error-callback': () => showRecaptchaError('reCAPTCHA gagal dimuat. Coba muat ulang halaman ini.'),
            });
        }

        function updateStepState() {
            const percentage = Math.round((currentStep / totalSteps) * 100);

            panels.forEach((panel) => {
                const panelStep = Number(panel.dataset.stepPanel);
                panel.classList.toggle('is-active', panelStep === currentStep);
            });

            stepButtons.forEach((button) => {
                const targetStep = Number(button.dataset.stepTarget);
                const isActive = targetStep === currentStep;
                const isComplete = targetStep < currentStep;

                button.classList.toggle('is-active', isActive);
                button.classList.toggle('is-complete', isComplete);
                button.disabled = targetStep > currentStep;
                button.setAttribute('aria-current', isActive ? 'step' : 'false');
            });

            prevButton.disabled = currentStep === 1;
            nextButton.hidden = currentStep === totalSteps;
            submitButton.hidden = currentStep !== totalSteps;
            progressLabel.textContent = 'Langkah ' + currentStep + ' dari ' + totalSteps;
            progressValue.textContent = percentage + '% selesai';
            progressBar.style.width = percentage + '%';
            caption.textContent = currentStep === totalSteps
                ? 'Tinjau ringkasan terakhir, selesaikan verifikasi, lalu kirim formulir.'
                : 'Lengkapi langkah ini lalu lanjut ke tahap berikutnya.';

            if (currentStep === totalSteps) {
                renderRecaptcha();
            }
        }

        function validateStep(step) {
            const panel = panels.find((item) => Number(item.dataset.stepPanel) === step);

            if (!panel) {
                return true;
            }

            const fields = Array.from(panel.querySelectorAll('input, select, textarea'))
                .filter((field) => field.type !== 'hidden' && !field.disabled);

            for (const field of fields) {
                if (!field.checkValidity()) {
                    field.reportValidity();
                    field.focus();
                    return false;
                }
            }

            if (step === totalSteps && recaptchaSiteKey) {
                renderRecaptcha();

                const recaptchaResponse = form.querySelector('[name="g-recaptcha-response"]')?.value || '';

                if (!recaptchaResponse) {
                    showRecaptchaError('Selesaikan verifikasi reCAPTCHA sebelum mengirim formulir.');
                    recaptchaContainer?.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    return false;
                }

                clearRecaptchaError();
            }

            return true;
        }

        function setStep(step, shouldScroll = true) {
            currentStep = Math.min(Math.max(step, 1), totalSteps);
            updateStepState();

            if (shouldScroll) {
                form.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }

        prevButton.addEventListener('click', () => {
            if (currentStep > 1) {
                setStep(currentStep - 1);
            }
        });

        nextButton.addEventListener('click', () => {
            if (validateStep(currentStep)) {
                setStep(currentStep + 1);
            }
        });

        stepButtons.forEach((button) => {
            button.addEventListener('click', () => {
                const targetStep = Number(button.dataset.stepTarget);

                if (targetStep < currentStep) {
                    setStep(targetStep);
                }
            });
        });

        form.addEventListener('submit', (event) => {
            if (currentStep !== totalSteps) {
                event.preventDefault();

                if (validateStep(currentStep)) {
                    setStep(currentStep + 1);
                }

                return;
            }

            if (!validateStep(totalSteps)) {
                event.preventDefault();
                return;
            }

            submitButton.disabled = true;
            submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span><span>Memproses...</span>';
        });

        photoInput?.addEventListener('change', updatePhotoPreview);
        alasanInput?.addEventListener('input', () => {
            updateAlasanCounter();
            updateSummary();
        });
        tanggalLahirInput?.addEventListener('change', updateAgePreview);

        Array.from(form.querySelectorAll('input, select, textarea')).forEach((field) => {
            if (field === alasanInput || field === photoInput || field === tanggalLahirInput) {
                return;
            }

            field.addEventListener('input', updateSummary);
            field.addEventListener('change', updateSummary);
        });

        window.addEventListener('join:recaptcha-ready', renderRecaptcha);

        if (window.joinRecaptchaLoaded && currentStep === totalSteps) {
            renderRecaptcha();
        }

        updateSummary();
        updateAgePreview();
        updateAlasanCounter();
        updatePhotoPreview();
        setStep(currentStep, false);
    })();
</script>
@endpush
