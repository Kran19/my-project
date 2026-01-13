@extends('customer.layouts.master')

@section('title', 'APIQO Jewellery - Fashion & Imitation Jewelry Store')
@section('meta_description', 'Discover trendy fashion jewelry and imitation jewelry collections at APIQO. Affordable style, premium designs - earrings, necklaces, rings, bracelets and more.')
@section('meta_keywords', 'fashion jewelry, imitation jewelry, costume jewelry, trendy accessories, affordable jewelry, fashion earrings, statement necklaces, party wear jewelry')
@section('og_title', 'APIQO Jewellery - Fashion Jewelry Store')
@section('og_description', 'Discover trendy fashion jewelry and imitation jewelry collections at APIQO.')
@section('og_image', asset('logo.jpeg'))
@section('twitter_title', 'APIQO Jewellery - Fashion Jewelry Store')
@section('twitter_description', 'Discover trendy fashion jewelry and imitation jewelry collections at APIQO.')

@section('styles')
<style>
/* Custom animation for spin icon */
@keyframes spin-slow {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.animate-spin-slow { animation: spin-slow 3s linear infinite; }

/* Counter animation */
@keyframes countUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.stat-counter.animated { animation: countUp 0.5s ease-out forwards; }
.stat-counter { font-variant-numeric: tabular-nums; }

/* Image hover animation styles */
.image-transition-enter { opacity: 0; transform: scale(1.1); }
.image-transition-enter-active {
    opacity: 1; transform: scale(1.05);
    transition: opacity 0.7s cubic-bezier(0.4, 0, 0.2, 1),
                transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
}
.image-transition-exit { opacity: 1; transform: scale(1.05); }
.image-transition-exit-active {
    opacity: 0; transform: scale(1.1);
    transition: opacity 0.7s cubic-bezier(0.4, 0, 0.2, 1),
                transform 0.7s cubic-bezier(0.4, 0, 0.2, 1);
}

/* Pulse animation for hover effect */
@keyframes pulse-zoom {
    0% { transform: scale(1); }
    50% { transform: scale(1.02); }
    100% { transform: scale(1); }
}

.hover-pulse { animation: pulse-zoom 2s ease-in-out infinite; }

/* Floating Background Animation */
@keyframes float {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    33% { transform: translate(30px, -30px) rotate(120deg); }
    66% { transform: translate(-20px, 20px) rotate(240deg); }
}

@keyframes float-delayed {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    33% { transform: translate(-30px, 30px) rotate(-120deg); }
    66% { transform: translate(20px, -20px) rotate(-240deg); }
}

.animate-float { animation: float 20s ease-in-out infinite; }
.animate-float-delayed { animation: float-delayed 25s ease-in-out infinite; }

/* Pulse Slow */
@keyframes pulse-slow {
    0%, 100% { opacity: 0.3; transform: scale(1); }
    50% { opacity: 0.5; transform: scale(1.1); }
}

.animate-pulse-slow { animation: pulse-slow 8s ease-in-out infinite; }

/* Shimmer Line Animation */
@keyframes shimmer {
    0% { opacity: 0.3; }
    50% { opacity: 1; }
    100% { opacity: 0.3; }
}

.animate-shimmer { animation: shimmer 2s ease-in-out infinite; }
.animate-shimmer-delayed { animation: shimmer 2s ease-in-out infinite 1s; }

/* Fade In */
@keyframes fade-in {
    from { opacity: 0; }
    to { opacity: 1; }
}

.animate-fade-in { animation: fade-in 0.8s ease-out; }

/* Slide Up */
@keyframes slide-up {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-slide-up { animation: slide-up 0.8s ease-out 0.2s both; }
.animate-slide-up-delayed { animation: slide-up 0.8s ease-out 0.4s both; }

/* Scale In */
@keyframes scale-in {
    from { opacity: 0; transform: scale(0.9); }
    to { opacity: 1; transform: scale(1); }
}

.animate-scale-in { animation: scale-in 0.8s ease-out 0.6s both; }
.animate-scale-in-delayed { animation: scale-in 0.8s ease-out 0.8s both; }
.animate-scale-in-more-delayed { animation: scale-in 0.8s ease-out 1s both; }

/* Sparkle Effect */
@keyframes sparkle {
    0%, 100% { opacity: 0; transform: scale(0) rotate(0deg); }
    50% { opacity: 1; transform: scale(1) rotate(180deg); }
}

.animate-sparkle { animation: sparkle 2s ease-in-out infinite; }
.animate-sparkle-delayed { animation: sparkle 2s ease-in-out infinite 1s; }

/* Fade In Up */
@keyframes fade-in-up {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.animate-fade-in-up { animation: fade-in-up 0.8s ease-out 1.2s both; }

/* Advanced Animations for Slider */
@keyframes spin-slow { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
@keyframes spin-fast { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
@keyframes shimmer-slide {
    0% { transform: translateX(-100%) skewX(12deg); }
    100% { transform: translateX(200%) skewX(12deg); }
}
@keyframes slideIn {
    from { opacity: 0; transform: translateX(20px) scale(0.98); }
    to { opacity: 1; transform: translateX(0) scale(1); }
}
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(15px); }
    to { opacity: 1; transform: translateY(0); }
}
@keyframes progressBar { 0% { width: 0%; } 100% { width: 100%; } }
@keyframes pulse-glow {
    0%, 100% { box-shadow: 0 0 5px rgba(255, 182, 193, 0.5); }
    50% { box-shadow: 0 0 20px rgba(255, 182, 193, 0.8); }
}
@keyframes bounce-subtle {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}

.animate-float { animation: float 6s ease-in-out infinite; }
.animate-spin-slow { animation: spin-slow 20s linear infinite; }
.animate-spin-fast { animation: spin-fast 5s linear infinite; }
.shimmer-slide { animation: shimmer-slide 2s linear infinite; }
.animate-pulse-glow { animation: pulse-glow 2s ease-in-out infinite; }
.animate-bounce-subtle { animation: bounce-subtle 2s ease-in-out infinite; }

/* Slide Item Animation */
.slide-item { animation: slideIn 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards; }
.slide-item > div { transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1); }

/* Hover Effects */
.slide-item:hover { z-index: 10; }
.slide-item:hover > div { transform: translateY(-5px) scale(1.02); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5); }

/* Enhanced Navigation */
.slider-nav {
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.slider-nav:hover {
    box-shadow: 0 8px 25px rgba(255, 255, 255, 0.3);
    background: rgba(255, 255, 255, 0.25);
    transform: scale(1.1);
}

/* Pagination Dots */
.pagination-dot {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
}
.pagination-dot:hover { transform: scale(1.3); background: white !important; box-shadow: 0 0 15px rgba(255, 255, 255, 0.8); }
.pagination-dot.active {
    width: 24px !important;
    background: white !important;
    box-shadow: 0 0 15px rgba(255, 255, 255, 0.8);
    animation: pulse-glow 2s infinite;
}

/* Progress Bar */
.slider-progress {
    animation: progressBar 1s linear infinite;
    background: linear-gradient(90deg,
        rgba(255, 182, 193, 0.8),
        rgba(216, 191, 216, 0.9),
        rgba(255, 182, 193, 0.8));
}

/* Glass Effect */
.glass-effect {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.15);
    transition: all 0.3s ease;
}
.glass-effect:hover {
    background: rgba(255, 255, 255, 0.25);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid rgba(255, 255, 255, 0.3);
}

/* CTA Button Effects */
.cta-button {
    position: relative;
    overflow: hidden;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.cta-button::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
    transition: left 0.6s ease;
}
.cta-button:hover::before { left: 100%; }
.cta-button:hover {
    box-shadow: 0 15px 30px -10px rgba(255, 182, 193, 0.4);
    transform: translateY(-3px);
}

/* Icon Container Hover */
.group\/icon:hover .glass-effect {
    transform: scale(1.1);
    box-shadow: 0 20px 40px rgba(255, 182, 193, 0.3);
}

/* Badge Hover */
.group\/badge:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

/* Instagram Gradient Animation */
@keyframes gradient-x {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}
.animate-gradient-x {
    background-size: 200% 200%;
    animation: gradient-x 8s ease infinite;
}
@keyframes gradient-text {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}
.animate-gradient-text {
    background-size: 200% auto;
    animation: gradient-text 3s ease-in-out infinite;
}
.animate-gradient-text-slow {
    background-size: 200% auto;
    animation: gradient-text 5s ease-in-out infinite;
}
@keyframes width-grow {
    0% { width: 0%; left: 50%; }
    50% { width: 100%; left: 0%; }
    100% { width: 0%; left: 0%; }
}
.animate-width-grow { animation: width-grow 3s ease-in-out infinite; }

/* Auto-scroll indicator */
.auto-scroll-indicator {
    position: absolute;
    bottom: 10px;
    right: 60px;
    background: rgba(0, 0, 0, 0.5);
    color: white;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 0.75rem;
    opacity: 0.7;
    z-index: 20;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 4px;
    backdrop-filter: blur(5px);
    transition: all 0.3s ease;
}
.auto-scroll-indicator:hover {
    opacity: 1;
    background: rgba(0, 0, 0, 0.7);
    transform: scale(1.05);
}

/* Imitation Jewelry Specific Styles */
.badge-imitation {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}
.badge-trendy {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
}
.badge-affordable {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    color: white;
}
.badge-fashion {
    background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
    color: white;
}
.badge-party {
    background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
    color: #333;
}
.badge-daily {
    background: linear-gradient(135deg, #d299c2 0%, #fef9d7 100%);
    color: #333;
}

/* Category Section Headers */
.category-header {
    background: linear-gradient(90deg, rgba(255,255,255,0.9) 0%, rgba(255,255,255,0.7) 100%);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.2);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

/* Product Card Enhancements */
.product-card {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    background: linear-gradient(145deg, #ffffff, #f8f8f8);
    border: 1px solid rgba(229, 231, 235, 0.5);
}
.product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    border-color: rgba(255, 182, 193, 0.3);
}

/* Quick View Overlay */
.quick-view-overlay {
    background: rgba(0, 0, 0, 0.8);
    backdrop-filter: blur(10px);
}

/* Animation for product loading */
@keyframes shimmer {
    0% { background-position: -200% center; }
    100% { background-position: 200% center; }
}
.shimmer {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: shimmer 2s infinite;
}

/* Floating action buttons */
.floating-action {
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 100;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
    cursor: pointer;
    transition: all 0.3s ease;
}
.floating-action:hover {
    transform: scale(1.1);
    box-shadow: 0 15px 40px rgba(102, 126, 234, 0.6);
}

/* Breadcrumb animation */
.breadcrumb-item {
    position: relative;
    transition: all 0.3s ease;
}
.breadcrumb-item:hover {
    transform: translateY(-2px);
}
.breadcrumb-item::after {
    content: '›';
    margin: 0 8px;
    color: #999;
}
.breadcrumb-item:last-child::after {
    display: none;
}

/* Category grid enhancements */
.category-grid-item {
    position: relative;
    overflow: hidden;
    border-radius: 16px;
    transition: all 0.4s ease;
}
.category-grid-item::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(to bottom, transparent 50%, rgba(0,0,0,0.7) 100%);
    z-index: 1;
    transition: all 0.4s ease;
}
.category-grid-item:hover::before {
    background: linear-gradient(to bottom, transparent 30%, rgba(0,0,0,0.8) 100%);
}
.category-grid-item:hover {
    transform: scale(1.03);
}

/* Material tags styling */
.material-tag {
    background: rgba(255,255,255,0.9);
    border: 1px solid rgba(0,0,0,0.1);
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 500;
    transition: all 0.3s ease;
}
.material-tag:hover {
    background: white;
    border-color: #667eea;
    color: #667eea;
    transform: translateY(-1px);
}

/* Price display */
.price-display {
    font-family: 'Inter', sans-serif;
    font-weight: 700;
}
.discounted-price {
    color: #ef4444;
}
.original-price {
    color: #9ca3af;
    text-decoration: line-through;
}

/* Add to cart button animation */
.add-to-cart-btn {
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease;
}
.add-to-cart-btn::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 5px;
    height: 5px;
    background: rgba(255,255,255,0.5);
    border-radius: 100%;
    transform: scale(1, 1) translate(-50%);
    transform-origin: 50% 50%;
}
.add-to-cart-btn:focus:not(:active)::after {
    animation: ripple 1s ease-out;
}
@keyframes ripple {
    0% {
        transform: scale(0, 0);
        opacity: 0.5;
    }
    100% {
        transform: scale(40, 40);
        opacity: 0;
    }
}

/* Buy now button */
.buy-now-btn {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
    font-weight: 600;
    transition: all 0.3s ease;
}
.buy-now-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(245, 87, 108, 0.4);
}

/* Notification toast */
.notification-toast {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 1000;
    background: white;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    padding: 16px 24px;
    display: flex;
    align-items: center;
    gap: 12px;
    transform: translateX(120%);
    transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}
.notification-toast.show {
    transform: translateX(0);
}
.notification-toast.success {
    border-left: 4px solid #10b981;
}
.notification-toast.error {
    border-left: 4px solid #ef4444;
}
.notification-toast.warning {
    border-left: 4px solid #f59e0b;
}

/* Loading spinner */
.loading-spinner {
    width: 40px;
    height: 40px;
    border: 3px solid #f3f3f3;
    border-top: 3px solid #667eea;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}
@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Section divider */
.section-divider {
    position: relative;
    height: 1px;
    background: linear-gradient(90deg, transparent, rgba(0,0,0,0.1), transparent);
}
.section-divider::before {
    content: '✦';
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    padding: 0 16px;
    color: #9ca3af;
    font-size: 12px;
}
</style>
@endsection

@section('content')

<!-- ============================================
   ENHANCED PROMOTIONAL SLIDER BANNER
   ============================================ -->
<section class="relative w-full overflow-hidden bg-gradient-to-br from-pink-50 via-purple-50 to-pink-50 py-6 md:py-12">
    <!-- ANIMATED BACKGROUND ELEMENTS -->
    <div class="absolute top-0 left-0 w-48 h-48 md:w-64 md:h-64 bg-pink-200/20 rounded-full blur-2xl md:blur-3xl -translate-x-16 md:-translate-x-32 -translate-y-16 md:-translate-y-32 animate-pulse"></div>
    <div class="absolute bottom-0 right-0 w-64 h-64 md:w-96 md:h-96 bg-purple-300/10 rounded-full blur-2xl md:blur-3xl translate-x-16 md:translate-x-32 translate-y-16 md:translate-y-32 animate-pulse" style="animation-delay: 1s;"></div>

    <!-- SLIDER CONTAINER -->
    <div class="max-w-7xl mx-auto px-3 sm:px-4 relative z-10">
        <div class="promo-slider-container relative overflow-hidden rounded-2xl md:rounded-3xl shadow-xl md:shadow-2xl shadow-pink-900/20 hover:shadow-pink-900/30 transition-all duration-500 group">
            <!-- AUTO-SCROLL PROGRESS BAR -->
            <div class="absolute top-0 left-0 w-full h-1 bg-white/20 z-30">
                <div class="slider-progress h-full bg-gradient-to-r from-pink-300 via-purple-400 to-pink-300 w-0"></div>
            </div>

            <!-- SLIDER TRACK -->
            <div class="slider-track flex transition-transform duration-700 ease-[cubic-bezier(0.4,0,0.2,1)]">
                @foreach($promoSlides as $index => $slide)
                <div class="slide-item flex-shrink-0 w-full">
                    <div class="relative bg-gradient-to-r {{ $slide['bg_color'] }} overflow-hidden rounded-2xl md:rounded-3xl transform transition-all duration-500 hover:scale-[1.02] group-hover:scale-100 hover:shadow-2xl hover:shadow-pink-900/20">
                        <!-- BACKGROUND IMAGE -->
                        <div class="absolute inset-0 overflow-hidden">
                            <img
                                src="{{ $slide['image'] }}"
                                alt="{{ $slide['title'] }}"
                                class="w-full h-full object-cover opacity-20 md:opacity-20 scale-110 group-hover:scale-125 transition-transform duration-10000 group-hover/slide:scale-125"
                                loading="lazy"
                            />
                        </div>

                        <!-- CONTENT -->
                        <div class="relative z-10 p-5 sm:p-6 md:p-8 lg:p-12 flex flex-col md:flex-row items-center justify-between min-h-[320px] sm:min-h-[280px] md:min-h-[300px]">
                            <!-- LEFT CONTENT -->
                            <div class="flex-1 mb-6 md:mb-0 md:pr-8 transform transition-all duration-700 group-hover/slide:translate-x-2">
                                <!-- BADGE -->
                                <div class="inline-flex items-center gap-2 {{ $slide['badge_color'] }} backdrop-blur-sm px-4 py-2 rounded-full mb-4 shadow-lg hover:scale-105 hover:shadow-xl transition-all duration-300 hover:translate-y-[-2px]">
                                    <span class="text-xs sm:text-sm font-bold tracking-wider {{ $slide['text_color'] }}">
                                        {{ $slide['badge'] }}
                                    </span>
                                </div>

                                <!-- TITLE -->
                                <h3 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-3 {{ $slide['text_color'] }} leading-tight group-hover/slide:translate-y-[-2px] transition-transform duration-300">
                                    {{ $slide['title'] }}
                                </h3>

                                <!-- HIGHLIGHT -->
                                <div class="mb-3 transform transition-all duration-500 group-hover/slide:translate-y-[-3px]">
                                    <p class="text-xl sm:text-2xl md:text-3xl font-bold {{ $slide['text_color'] }} mb-2 hover:text-pink-100 transition-colors duration-300">
                                        {{ $slide['highlight'] }}
                                    </p>
                                </div>

                                <!-- SUBTITLE -->
                                <p class="text-lg sm:text-xl mb-3 {{ $slide['text_color'] }} opacity-95 font-medium group-hover/slide:opacity-100 group-hover/slide:translate-x-2 transition-all duration-300">
                                    {{ $slide['subtitle'] }}
                                </p>

                                <!-- DESCRIPTION -->
                                <p class="text-sm sm:text-base md:text-lg mb-6 {{ $slide['text_color'] }} opacity-90 max-w-xl leading-relaxed group-hover/slide:opacity-100 group-hover/slide:translate-y-[-2px] transition-all duration-500">
                                    {{ $slide['description'] }}
                                </p>

                                <!-- CTA BUTTON -->
                                <a href="{{ route('customer.category.products', $slide['category_slug'] ?? 'all') }}"
                                   class="cta-button inline-flex items-center gap-2 bg-gradient-to-r from-white to-pink-50 text-pink-900 px-6 py-3 sm:px-8 sm:py-4 rounded-full font-bold
                                         hover:from-pink-50 hover:to-white transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl group/btn relative overflow-hidden
                                         hover:translate-y-[-2px] active:translate-y-[1px]">
                                    <span class="relative z-10 text-sm sm:text-base group-hover/btn:tracking-wider transition-all duration-300">{{ $slide['cta'] }}</span>
                                    <i class="fas fa-arrow-right text-xs sm:text-sm relative z-10 transform group-hover/btn:translate-x-2 group-hover/btn:scale-110 transition-all duration-300"></i>
                                </a>
                            </div>

                            <!-- RIGHT ICON -->
                            <div class="flex-shrink-0 transform transition-all duration-2000 mt-4 md:mt-0 group-hover/slide:scale-110 group-hover/slide:rotate-[360deg]">
                                <div class="w-20 h-20 sm:w-24 sm:h-24 md:w-28 md:h-28 glass-effect rounded-2xl md:rounded-3xl flex items-center justify-center
                                            shadow-xl relative overflow-hidden group/icon hover:shadow-2xl hover:shadow-white/20 transition-all duration-500">
                                    <i class="{{ $slide['icon'] }} {{ $slide['text_color'] }} text-3xl sm:text-4xl md:text-5xl relative z-10 group-hover/icon:scale-125 group-hover/icon:text-pink-200 transition-all duration-500"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- NAVIGATION ARROWS -->
            <button class="slider-nav slider-prev absolute left-2 sm:left-4 top-1/2 transform -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12
                         glass-effect rounded-full flex items-center justify-center
                         hover:bg-white/30 active:scale-95 transition-all duration-300 z-20
                         opacity-100 md:opacity-0 md:group-hover:opacity-100 shadow-lg
                         hover:scale-110 hover:shadow-xl hover:border-white/40 hover:-translate-x-1">
                <i class="fas fa-chevron-left text-black text-lg sm:text-xl hover:scale-125 transition-transform duration-300"></i>
            </button>

            <button class="slider-nav slider-next absolute right-2 sm:right-4 top-1/2 transform -translate-y-1/2 w-10 h-10 sm:w-12 sm:h-12
                         glass-effect rounded-full flex items-center justify-center
                         hover:bg-white/30 active:scale-95 transition-all duration-300 z-20
                         opacity-100 md:opacity-0 md:group-hover:opacity-100 shadow-lg
                         hover:scale-110 hover:shadow-xl hover:border-white/40 hover:translate-x-1">
                <i class="fas fa-chevron-right text-black text-lg sm:text-xl hover:scale-125 transition-transform duration-300"></i>
            </button>

            <!-- PAGINATION DOTS -->
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2 z-20">
                @foreach($promoSlides as $index => $slide)
                <button class="pagination-dot w-2 h-2 sm:w-3 sm:h-3 rounded-full bg-white/50 hover:bg-white transition-all duration-300
                            relative hover:scale-125 hover:shadow-md" data-slide="{{ $index }}">
                    <div class="absolute inset-0 rounded-full bg-white/20 hover:bg-white/40 transition-colors duration-300"></div>
                </button>
                @endforeach
            </div>

            <!-- SLIDER COUNTER -->
            <div class="absolute top-7 right-6 z-20 group/counter">
                <div class="bg-black/40 backdrop-blur-sm px-2 py-1 sm:px-3 sm:py-2 rounded-full hover:bg-black/60 hover:scale-105 transition-all duration-300">
                    <span class="text-black text-xs sm:text-sm font-medium">
                        <span class="current-slide">1</span>/<span class="total-slides">{{ count($promoSlides) }}</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============================================
   NEW ARRIVALS SECTION
   ============================================ -->
<section class="py-16 bg-gradient-to-r from-purple-50 to-pink-50">
    <div class="max-w-7xl mx-auto px-4">
        <!-- SECTION HEADER -->
        <div class="category-header rounded-2xl p-6 mb-12 animate-slide-up">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <span class="inline-block badge-trendy px-4 py-2 rounded-full text-sm font-semibold mb-3">
                        NEW ARRIVALS
                    </span>
                    <h2 class="text-3xl md:text-4xl font-bold text-purple-800 mb-3">
                        Just In: Latest Fashion Jewelry
                    </h2>
                    <p class="text-gray-700 max-w-2xl">
                        Fresh designs just added to our collection. Be the first to own them!
                    </p>
                </div>
                <a href="{{ route('customer.products.list') }}?sort_by=newest"
                   class="inline-flex items-center gap-2 text-purple-700 font-semibold hover:underline group px-6 py-3 bg-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                    View All New Arrivals
                    <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>

        <!-- PRODUCTS GRID -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($newProducts as $index => $product)
            @if($index < 8)
            <div class="product-card rounded-2xl overflow-hidden group relative">
                <div class="relative aspect-square overflow-hidden bg-gray-100">
                    <a href="{{ route('customer.products.details', $product['slug'] ?? 'product-' . $product['id']) }}">
                        <img src="{{ $product['main_image'] }}" alt="{{ $product['name'] }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </a>
                    @if($product['discount_percent'] > 0)
                    <div class="absolute top-3 right-3 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                        -{{ $product['discount_percent'] }}%
                    </div>
                    @endif
                    @if($product['is_new'])
                    <div class="absolute top-3 left-3 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                        NEW
                    </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                        <div class="p-4 w-full translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                            <div class="flex gap-2">
                                <form action="" method="POST" class="wishlist-form flex-1">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                    <button type="submit"
                                            class="w-full px-4 py-2 bg-white text-gray-800 rounded-lg font-semibold hover:bg-gray-50 transition-colors flex items-center justify-center gap-2 text-sm">
                                        <i class="far fa-heart"></i>
                                        <span>Wishlist</span>
                                    </button>
                                </form>
                                <form action="" method="POST" class="flex-1">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                    <button type="submit"
                                            class="w-full px-4 py-2 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg font-semibold hover:opacity-90 transition-opacity flex items-center justify-center gap-2 text-sm">
                                        <i class="fas fa-shopping-cart"></i>
                                        <span>Cart</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-gray-800 text-sm mb-2 line-clamp-2 hover:text-purple-700 transition-colors">
                        <a href="{{ route('customer.products.details', $product['slug'] ?? 'product-' . $product['id']) }}">
                            {{ $product['name'] }}
                        </a>
                    </h3>
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <span class="text-lg font-bold price-display text-purple-700">₹{{ number_format($product['price'], 2) }}</span>
                            @if($product['compare_price'] && $product['compare_price'] > $product['price'])
                            <span class="text-sm text-gray-500 line-through ml-2">₹{{ number_format($product['compare_price'], 2) }}</span>
                            @endif
                        </div>
                        <div class="flex items-center text-yellow-400">
                            <i class="fas fa-star text-xs"></i>
                            <span class="text-xs ml-1">{{ $product['rating'] }}</span>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <form action="" method="POST" class="add-to-cart-btn flex-1">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                            <button type="submit"
                                    class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white py-2 rounded-lg font-semibold text-sm hover:opacity-90 transition-opacity">
                                Add to Cart
                            </button>
                        </form>
                        <form action="" method="POST" class="buy-now-btn flex-1">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                            <button type="submit"
                                    class="w-full bg-gradient-to-r from-pink-500 to-rose-500 text-white py-2 rounded-lg font-semibold text-sm hover:opacity-90 transition-opacity">
                                Buy Now
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</section>

<!-- ============================================
   CATEGORY SECTIONS - Dynamic Category Display
   ============================================ -->
@php
$categoryStyles = [
    0 => [
        'bg' => 'bg-gradient-to-r from-purple-50 to-pink-50',
        'badge' => 'badge-party',
        'text' => 'text-purple-800',
        'button' => 'from-purple-500 to-pink-500'
    ],
    1 => [
        'bg' => 'bg-gradient-to-r from-blue-50 to-cyan-50',
        'badge' => 'badge-daily',
        'text' => 'text-blue-800',
        'button' => 'from-blue-500 to-cyan-500'
    ],
    2 => [
        'bg' => 'bg-gradient-to-r from-pink-50 to-rose-50',
        'badge' => 'badge-fashion',
        'text' => 'text-pink-800',
        'button' => 'from-pink-500 to-rose-500'
    ],
    3 => [
        'bg' => 'bg-gradient-to-r from-orange-50 to-amber-50',
        'badge' => 'badge-trendy',
        'text' => 'text-orange-800',
        'button' => 'from-orange-500 to-amber-500'
    ],
    4 => [
        'bg' => 'bg-gradient-to-r from-indigo-50 to-violet-50',
        'badge' => 'badge-affordable',
        'text' => 'text-indigo-800',
        'button' => 'from-indigo-500 to-violet-500'
    ],
    5 => [
        'bg' => 'bg-gradient-to-r from-rose-50 to-pink-50',
        'badge' => 'badge-trendy',
        'text' => 'text-rose-800',
        'button' => 'from-rose-500 to-pink-500'
    ]
];
@endphp

@foreach($categories as $index => $category)
@php
    $style = $categoryStyles[$index] ?? $categoryStyles[$index % count($categoryStyles)];
    $products = $categoryProducts[$category->id] ?? [];
    $categorySlug = strtolower(str_replace(' ', '-', $category->name));
@endphp

<section class="py-16 {{ $style['bg'] }}" id="category-{{ $category->slug }}">
    <div class="max-w-7xl mx-auto px-4">
        <!-- CATEGORY HEADER -->
        <div class="category-header rounded-2xl p-6 mb-12 animate-slide-up">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div>
                    <span class="inline-block {{ $style['badge'] }} px-4 py-2 rounded-full text-sm font-semibold mb-3">
                        {{ strtoupper($category->name) }}
                    </span>
                    <h2 class="text-3xl md:text-4xl font-bold {{ $style['text'] }} mb-3">
                        {{ $category->name }} Collection
                    </h2>
                    <p class="text-gray-700 max-w-2xl">
                        Discover our curated selection of {{ strtolower($category->name) }} jewelry. Perfect for every occasion.
                    </p>
                </div>
                <a href="{{ route('customer.category.products', $category->slug) }}"
                   class="inline-flex items-center gap-2 {{ $style['text'] }} font-semibold hover:underline group px-6 py-3 bg-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105">
                    View All {{ $category->name }}
                    <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
        </div>

        @if(count($products))
        <!-- PRODUCTS GRID -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach($products as $productIndex => $product)
            @if($productIndex < 8)
            <div class="product-card rounded-2xl overflow-hidden group relative animate-fade-in-up" style="animation-delay: {{ $productIndex * 0.1 }}s">
                <div class="relative aspect-square overflow-hidden bg-gray-100">
                    <a href="{{ route('customer.products.details', $product['slug'] ?? 'product-' . $product['id']) }}">
                        <img src="{{ asset('storage/' . $product['main_image']) }}" alt="{{ $product['name'] }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    </a>
                    @if($product['discount_percent'] > 0)
                    <div class="absolute top-3 right-3 bg-red-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                        -{{ $product['discount_percent'] }}%
                    </div>
                    @endif
                    @if($product['is_new'] ?? false)
                    <div class="absolute top-3 left-3 bg-green-500 text-white px-3 py-1 rounded-full text-xs font-bold shadow-lg">
                        NEW
                    </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                        <div class="p-4 w-full translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                            <div class="flex gap-2">
                                <form action="" method="POST" class="wishlist-form flex-1">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                    <button type="submit"
                                            class="w-full px-4 py-2 bg-white text-gray-800 rounded-lg font-semibold hover:bg-gray-50 transition-colors flex items-center justify-center gap-2 text-sm">
                                        <i class="far fa-heart"></i>
                                        <span>Wishlist</span>
                                    </button>
                                </form>
                                <form action="" method="POST" class="flex-1">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                    <button type="submit"
                                            class="w-full px-4 py-2 bg-gradient-to-r {{ $style['button'] }} text-white rounded-lg font-semibold hover:opacity-90 transition-opacity flex items-center justify-center gap-2 text-sm">
                                        <i class="fas fa-shopping-cart"></i>
                                        <span>Cart</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-gray-800 text-sm mb-2 line-clamp-2 hover:{{ $style['text'] }} transition-colors">
                        <a href="{{ route('customer.products.details', $product['slug'] ?? 'product-' . $product['id']) }}">
                            {{ $product['name'] }}
                        </a>
                    </h3>

                    <!-- MATERIAL TAGS -->
                    @if(isset($product['materials']) && is_array($product['materials']))
                    <div class="flex flex-wrap gap-1 mb-3">
                        @foreach(array_slice($product['materials'], 0, 2) as $material)
                        <span class="material-tag text-xs">{{ $material }}</span>
                        @endforeach
                        @if(count($product['materials']) > 2)
                        <span class="material-tag text-xs">+{{ count($product['materials']) - 2 }} more</span>
                        @endif
                    </div>
                    @endif

                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <span class="text-lg font-bold price-display {{ $style['text'] }}">₹{{ number_format($product['price'], 2) }}</span>
                            @if($product['compare_price'] && $product['compare_price'] > $product['price'])
                            <span class="text-sm text-gray-500 line-through ml-2">₹{{ number_format($product['compare_price'], 2) }}</span>
                            @endif
                        </div>
                        <div class="flex items-center text-yellow-400">
                            <i class="fas fa-star text-xs"></i>
                            <span class="text-xs ml-1">{{ $product['rating'] ?? '4.5' }}</span>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <form action="" method="POST" class="add-to-cart-btn flex-1">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                            <button type="submit"
                                    class="w-full bg-gradient-to-r {{ $style['button'] }} text-white py-2 rounded-lg font-semibold text-sm hover:opacity-90 transition-opacity">
                                Add to Cart
                            </button>
                        </form>
                        <form action="" method="POST" class="buy-now-btn flex-1">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                            <button type="submit"
                                    class="w-full bg-gradient-to-r from-pink-500 to-rose-500 text-white py-2 rounded-lg font-semibold text-sm hover:opacity-90 transition-opacity">
                                Buy Now
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>

        <!-- VIEW MORE BUTTON -->
        @if(count($products) > 8)
        <div class="text-center mt-12">
            <a href="{{ route('customer.category.products', $category->slug) }}"
               class="inline-flex items-center gap-2 {{ $style['text'] }} font-semibold px-8 py-3 bg-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105 group">
                View All {{ count($products) }} Products
                <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
        @endif

        @else
        <!-- EMPTY STATE -->
        <div class="text-center py-12">
            <div class="w-24 h-24 mx-auto mb-6 bg-gray-200 rounded-full flex items-center justify-center">
                <i class="fas fa-gem text-gray-400 text-3xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-700 mb-2">No Products Available</h3>
            <p class="text-gray-500 mb-6">We're updating our {{ $category->name }} collection. Check back soon!</p>
            <a href="{{ route('customer.products.list') }}"
               class="inline-flex items-center gap-2 text-purple-600 font-semibold hover:underline">
                Browse Other Collections
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        @endif
    </div>
</section>
@endforeach

<!-- ============================================
   FEATURED PRODUCTS SECTION
   ============================================ -->
<section class="py-16 bg-gradient-to-r from-pink-50 to-purple-50">
    <div class="max-w-7xl mx-auto px-4">
        <!-- SECTION HEADER -->
        <div class="category-header rounded-2xl p-6 mb-12 animate-slide-up">
            <div class="text-center">
                <span class="badge-fashion px-6 py-2 rounded-full text-sm font-semibold mb-4 inline-block">
                    EDITOR'S PICK
                </span>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                    Featured <span class="text-pink-600">Collections</span>
                </h2>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto">
                    Handpicked by our style experts. The best of imitation jewelry for every occasion.
                </p>
            </div>
        </div>

        <!-- FEATURED PRODUCTS GRID -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            @foreach($featuredProducts as $index => $product)
            @if($index < 4)
            <div class="product-card rounded-2xl overflow-hidden group relative animate-fade-in-up" style="animation-delay: {{ $index * 0.2 }}s">
                <div class="relative aspect-square overflow-hidden bg-gray-100">
                    <a href="{{ route('customer.products.details', $product['slug'] ?? 'product-' . $product['id']) }}">
                        <img src="{{ $product['main_image'] }}" alt="{{ $product['name'] }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    </a>
                    @if($product['is_featured'])
                    <div class="absolute top-4 left-4 bg-gradient-to-r from-yellow-500 to-amber-500 text-white px-4 py-2 rounded-full text-xs font-bold shadow-lg">
                        FEATURED
                    </div>
                    @endif
                    @if($product['discount_percent'] > 0)
                    <div class="absolute top-4 right-4 bg-gradient-to-r from-red-500 to-pink-500 text-white px-4 py-2 rounded-full text-xs font-bold shadow-lg">
                        -{{ $product['discount_percent'] }}%
                    </div>
                    @endif
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end">
                        <div class="p-4 w-full translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                            <div class="flex gap-2">
                                <form action="" method="POST" class="wishlist-form flex-1">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                    <button type="submit"
                                            class="w-full px-4 py-3 bg-white text-gray-800 rounded-lg font-semibold hover:bg-gray-50 transition-colors flex items-center justify-center gap-2">
                                        <i class="far fa-heart"></i>
                                        <span>Wishlist</span>
                                    </button>
                                </form>
                                <form action="" method="POST" class="flex-1">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                                    <button type="submit"
                                            class="w-full px-4 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg font-semibold hover:opacity-90 transition-opacity flex items-center justify-center gap-2">
                                        <i class="fas fa-shopping-cart"></i>
                                        <span>Cart</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-gray-800 text-lg mb-3 hover:text-purple-700 transition-colors">
                        <a href="{{ route('customer.products.details', $product['slug'] ?? 'product-' . $product['id']) }}">
                            {{ $product['name'] }}
                        </a>
                    </h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $product['short_description'] ?? 'Premium fashion jewelry piece' }}</p>
                    <div class="flex items-center justify-between mb-4">
                        <div>
                            <span class="text-2xl font-bold price-display text-purple-700">₹{{ number_format($product['price'], 2) }}</span>
                            @if($product['compare_price'] && $product['compare_price'] > $product['price'])
                            <span class="text-sm text-gray-500 line-through ml-2">₹{{ number_format($product['compare_price'], 2) }}</span>
                            @endif
                        </div>
                        <div class="flex items-center text-yellow-400">
                            <i class="fas fa-star"></i>
                            <span class="text-sm ml-1">{{ $product['rating'] }}</span>
                        </div>
                    </div>
                    <div class="flex gap-2">
                        <form action="" method="POST" class="add-to-cart-btn flex-1">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                            <button type="submit"
                                    class="w-full px-4 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-lg font-semibold hover:opacity-90 transition-opacity flex items-center justify-center gap-2">
                                <i class="fas fa-shopping-cart"></i>
                                <span>Add to Cart</span>
                            </button>
                        </form>
                        <form action="" method="POST" class="buy-now-btn flex-1">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                            <button type="submit"
                                    class="w-full px-4 py-3 bg-gradient-to-r from-pink-600 to-rose-600 text-white rounded-lg font-semibold hover:opacity-90 transition-opacity flex items-center justify-center gap-2">
                                <i class="fas fa-bolt"></i>
                                <span>Buy Now</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>

        <!-- VIEW ALL FEATURED BUTTON -->
        <div class="text-center mt-12">
            <a href="{{ route('customer.products.list') }}?filter=featured"
               class="inline-flex items-center gap-2 text-purple-700 font-semibold px-8 py-3 bg-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-105 group">
                View All Featured Products
                <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
            </a>
        </div>
    </div>
</section>

<!-- ============================================
   STATS COUNTER SECTION
   ============================================ -->
<section class="bg-gradient-to-r from-pink-50 to-purple-50 py-16">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @php
            $statsDisplay = [
                ['value' => $stats['customer_count'] ?? '25', 'label' => 'Happy Customers', 'icon' => 'fas fa-smile', 'suffix' => '+'],
                ['value' => $stats['product_count'] ?? '500', 'label' => 'Unique Designs', 'icon' => 'fas fa-gem', 'suffix' => '+'],
                ['value' => $stats['order_count'] ?? '1000', 'label' => 'Orders Delivered', 'icon' => 'fas fa-shipping-fast', 'suffix' => '+'],
                ['value' => $stats['review_count'] ?? '98', 'label' => '5-Star Reviews', 'icon' => 'fas fa-star', 'suffix' => '%'],
            ];
            @endphp

            @foreach($statsDisplay as $index => $stat)
            <div class="p-6 rounded-2xl bg-white/80 backdrop-blur-sm shadow-lg hover:shadow-xl transition-shadow duration-300 animate-scale-in" style="animation-delay: {{ $index * 0.1 }}s">
                <div class="text-4xl font-bold text-purple-800 mb-2 stat-counter"
                     data-target="{{ $stat['value'] }}"
                     data-suffix="{{ $stat['suffix'] }}">
                    0
                </div>
                <div class="flex items-center justify-center gap-2">
                    <i class="{{ $stat['icon'] }} text-pink-600"></i>
                    <p class="text-purple-800 font-medium">{{ $stat['label'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- ============================================
   PRE-FOOTER CTA
   ============================================ -->
<section class="py-20 bg-gradient-to-r from-purple-600 to-pink-600 text-white">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <div class="relative">
            <!-- ANIMATED BACKGROUND -->
            <div class="absolute inset-0 overflow-hidden opacity-20">
                <div class="absolute top-0 left-1/4 w-64 h-64 bg-white rounded-full blur-3xl animate-pulse"></div>
                <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-pink-300 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
            </div>

            <div class="relative z-10">
                <h3 class="text-3xl md:text-4xl font-bold mb-6">Ready to Elevate Your Style?</h3>
                <p class="text-xl mb-8 max-w-2xl mx-auto opacity-90">
                    Join thousands of fashion lovers who trust us for trendy, affordable jewelry
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('customer.products.list') }}"
                       class="bg-white text-purple-600 px-8 py-4 rounded-full font-bold
                              hover:bg-gray-100 transition-colors duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                        Start Shopping Now
                    </a>
                    <a href="{{ route('customer.products.list') }}?sort_by=newest"
                       class="bg-transparent border-2 border-white text-white px-8 py-4 rounded-full font-bold
                             hover:bg-white/10 transition-colors duration-300 hover:scale-105">
                        View New Arrivals
                    </a>
                </div>

                <!-- TRUST BADGES -->
                <div class="mt-12 pt-8 border-t border-white/20">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        <div class="flex flex-col items-center p-4 hover:scale-105 transition-transform duration-300">
                            <i class="fas fa-shipping-fast text-2xl mb-2"></i>
                            <p class="text-sm">Free Shipping<br><span class="font-bold">₹499+</span></p>
                        </div>
                        <div class="flex flex-col items-center p-4 hover:scale-105 transition-transform duration-300">
                            <i class="fas fa-undo-alt text-2xl mb-2"></i>
                            <p class="text-sm">15-Day<br>Returns</p>
                        </div>
                        <div class="flex flex-col items-center p-4 hover:scale-105 transition-transform duration-300">
                            <i class="fas fa-headset text-2xl mb-2"></i>
                            <p class="text-sm">24/7<br>Support</p>
                        </div>
                        <div class="flex flex-col items-center p-4 hover:scale-105 transition-transform duration-300">
                            <i class="fas fa-shield-alt text-2xl mb-2"></i>
                            <p class="text-sm">Secure<br>Payment</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FLOATING CART BUTTON -->
<a href="{{ route('customer.cart') }}" class="floating-action animate-bounce-subtle">
    <i class="fas fa-shopping-cart text-xl"></i>
    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-6 h-6 flex items-center justify-center">
        {{ $cartCount ?? 0 }}
    </span>
</a>

<!-- QUICK VIEW MODAL -->
<div id="quickViewModal" class="fixed inset-0 z-50 hidden quick-view-overlay">
    <div class="absolute inset-0" onclick="closeQuickView()"></div>
    <div class="absolute right-0 top-0 h-full w-full md:w-1/2 lg:w-1/3 bg-white transform translate-x-full transition-transform duration-300">
        <!-- Modal content will be loaded dynamically -->
    </div>
</div>

<!-- NOTIFICATION TOAST -->
<div id="notificationToast" class="notification-toast hidden">
    <i class="fas fa-check-circle text-green-500"></i>
    <span id="toastMessage">Product added to cart!</span>
</div>
@endsection

@section('scripts')
<script>
// JavaScript for animated counters
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.stat-counter');
    const speed = 300;

    const startCounter = (counter) => {
        const target = +counter.getAttribute('data-target');
        const suffix = counter.getAttribute('data-suffix') || '';
        const count = +counter.innerText.replace(suffix, '');
        const increment = target / speed;

        if (count < target) {
            counter.innerText = Math.ceil(count + increment) + suffix;
            setTimeout(() => startCounter(counter), 10);
        } else {
            counter.innerText = target + suffix;
        }
    };

    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.3
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                if (!counter.classList.contains('animated')) {
                    counter.classList.add('animated');
                    startCounter(counter);
                }
            }
        });
    }, observerOptions);

    counters.forEach(counter => {
        observer.observe(counter);
    });
});

// Slider JavaScript
document.addEventListener('DOMContentLoaded', function() {
    const sliderContainer = document.querySelector('.promo-slider-container');
    if (!sliderContainer) return;

    const sliderTrack = document.querySelector('.slider-track');
    const slides = document.querySelectorAll('.slide-item');
    const prevBtn = document.querySelector('.slider-prev');
    const nextBtn = document.querySelector('.slider-next');
    const dots = document.querySelectorAll('.pagination-dot');
    const progressBar = document.querySelector('.slider-progress');
    const currentSlideEl = document.querySelector('.current-slide');
    const totalSlidesEl = document.querySelector('.total-slides');

    let currentSlide = 0;
    const slideCount = slides.length;
    let slideWidth = 0;
    let autoSlideInterval;
    let isTransitioning = false;
    const AUTO_SCROLL_SPEED = 1000;

    function initSlider() {
        slideWidth = sliderContainer.clientWidth;
        sliderTrack.style.width = `${slideCount * 100}%`;
        slides.forEach(slide => {
            slide.style.width = `${slideWidth}px`;
        });
        totalSlidesEl.textContent = slideCount;
        updateSlider();
        startAutoSlide();
    }

    function updateSlider() {
        if (isTransitioning) return;
        isTransitioning = true;

        const translateX = -currentSlide * slideWidth;
        sliderTrack.style.transform = `translateX(${translateX}px)`;
        sliderTrack.style.transition = 'transform 0.7s cubic-bezier(0.4, 0, 0.2, 1)';

        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentSlide);
            if (index === currentSlide) {
                dot.style.width = '24px';
                dot.style.background = 'white';
            } else {
                dot.style.width = '12px';
                dot.style.background = 'rgba(255, 255, 255, 0.5)';
            }
        });

        currentSlideEl.textContent = currentSlide + 1;
        resetProgressBar();

        setTimeout(() => {
            isTransitioning = false;
        }, 700);
    }

    function resetProgressBar() {
        progressBar.style.animation = 'none';
        void progressBar.offsetWidth;
        progressBar.style.animation = `progressBar ${AUTO_SCROLL_SPEED}ms linear`;
    }

    function nextSlide() {
        if (isTransitioning) return;
        currentSlide = (currentSlide + 1) % slideCount;
        updateSlider();
        resetAutoScroll();
    }

    function prevSlide() {
        if (isTransitioning) return;
        currentSlide = (currentSlide - 1 + slideCount) % slideCount;
        updateSlider();
        resetAutoScroll();
    }

    function goToSlide(index) {
        if (isTransitioning || index === currentSlide) return;
        currentSlide = index;
        updateSlider();
        resetAutoScroll();
    }

    function startAutoSlide() {
        if (autoSlideInterval) {
            clearInterval(autoSlideInterval);
        }
        autoSlideInterval = setInterval(nextSlide, AUTO_SCROLL_SPEED);
        progressBar.style.animationPlayState = 'running';
    }

    function stopAutoSlide() {
        if (autoSlideInterval) {
            clearInterval(autoSlideInterval);
            autoSlideInterval = null;
        }
        progressBar.style.animationPlayState = 'paused';
    }

    function resetAutoScroll() {
        if (autoSlideInterval) {
            clearInterval(autoSlideInterval);
            autoSlideInterval = setInterval(nextSlide, AUTO_SCROLL_SPEED);
            resetProgressBar();
        }
    }

    // Event Listeners
    if (prevBtn) {
        prevBtn.addEventListener('click', function(e) {
            e.preventDefault();
            prevSlide();
        });
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', function(e) {
            e.preventDefault();
            nextSlide();
        });
    }

    if (dots) {
        dots.forEach((dot, index) => {
            dot.addEventListener('click', function(e) {
                e.preventDefault();
                goToSlide(index);
            });
        });
    }

    // Touch swipe support
    let touchStartX = 0;
    let touchEndX = 0;

    sliderContainer.addEventListener('touchstart', function(e) {
        touchStartX = e.changedTouches[0].screenX;
        stopAutoSlide();
    }, { passive: true });

    sliderContainer.addEventListener('touchend', function(e) {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
        startAutoSlide();
    }, { passive: true });

    function handleSwipe() {
        const swipeThreshold = 50;
        const diff = touchStartX - touchEndX;

        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                nextSlide();
            } else {
                prevSlide();
            }
        }
    }

    // Pause on hover (desktop only)
    if (window.innerWidth > 768) {
        sliderContainer.addEventListener('mouseenter', stopAutoSlide);
        sliderContainer.addEventListener('mouseleave', startAutoSlide);
    }

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') prevSlide();
        else if (e.key === 'ArrowRight') nextSlide();
    });

    // Handle window resize
    let resizeTimer;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(function() {
            initSlider();
        }, 250);
    });

    // Initialize slider
    initSlider();
});

// Smooth scrolling to category sections
document.querySelectorAll('a[href^="#category-"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        if (targetElement) {
            targetElement.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Add to cart functionality
document.querySelectorAll('.add-to-cart-btn').forEach(form => {
    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const productId = formData.get('product_id');

        // Animation
        const button = this.querySelector('button');
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Adding...';
        button.disabled = true;

        try {
            // In a real application, you would make an API call here
            // For now, simulate success
            await new Promise(resolve => setTimeout(resolve, 500));

            showNotification('Product added to cart successfully!', 'success');

            // Update cart count
            const cartCount = document.querySelector('.floating-action span');
            if (cartCount) {
                const currentCount = parseInt(cartCount.textContent) || 0;
                cartCount.textContent = currentCount + 1;
            }

        } catch (error) {
            showNotification('Failed to add product to cart', 'error');
        } finally {
            button.innerHTML = originalText;
            button.disabled = false;
        }
    });
});

// Buy now functionality
document.querySelectorAll('.buy-now-btn').forEach(form => {
    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const productId = formData.get('product_id');

        // Animation
        const button = this.querySelector('button');
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
        button.disabled = true;

        try {
            // In a real application, you would redirect to checkout
            // For now, simulate success
            await new Promise(resolve => setTimeout(resolve, 500));

            showNotification('Redirecting to checkout...', 'success');

            // In a real app, you would redirect:
            // window.location.href = '/checkout?product_id=' + productId;

        } catch (error) {
            showNotification('Failed to process order', 'error');
        } finally {
            button.innerHTML = originalText;
            button.disabled = false;
        }
    });
});

// Wishlist functionality
document.querySelectorAll('.wishlist-form').forEach(form => {
    form.addEventListener('submit', async function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        const productId = formData.get('product_id');

        // Animation
        const button = this.querySelector('button');
        const heartIcon = button.querySelector('i');
        heartIcon.classList.remove('far', 'fa-heart');
        heartIcon.classList.add('fas', 'fa-heart', 'text-red-500');

        try {
            await new Promise(resolve => setTimeout(resolve, 300));
            showNotification('Added to wishlist!', 'success');
        } catch (error) {
            heartIcon.classList.remove('fas', 'fa-heart', 'text-red-500');
            heartIcon.classList.add('far', 'fa-heart');
            showNotification('Failed to add to wishlist', 'error');
        }
    });
});

// Notification system
function showNotification(message, type = 'success') {
    const toast = document.getElementById('notificationToast');
    const toastMessage = document.getElementById('toastMessage');

    toastMessage.textContent = message;
    toast.className = 'notification-toast ' + type;
    toast.classList.remove('hidden');
    toast.classList.add('show');

    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => {
            toast.classList.add('hidden');
        }, 300);
    }, 3000);
}

// Quick view functionality
function openQuickView(productId) {
    const modal = document.getElementById('quickViewModal');
    modal.classList.remove('hidden');
    setTimeout(() => {
        modal.querySelector('div:nth-child(2)').style.transform = 'translateX(0)';
    }, 10);

    // Load product details via AJAX
    // fetch(`/api/products/${productId}/quick-view`)
    //     .then(response => response.text())
    //     .then(html => {
    //         modal.querySelector('div:nth-child(2)').innerHTML = html;
    //     });
}

function closeQuickView() {
    const modal = document.getElementById('quickViewModal');
    modal.querySelector('div:nth-child(2)').style.transform = 'translateX(100%)';
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
}

// Product image hover effect
document.querySelectorAll('.product-card').forEach(card => {
    const image = card.querySelector('img');
    const overlay = card.querySelector('.absolute.inset-0');

    if (image && overlay) {
        card.addEventListener('mouseenter', () => {
            overlay.classList.remove('opacity-0');
            overlay.querySelector('div').classList.remove('translate-y-full');
        });

        card.addEventListener('mouseleave', () => {
            overlay.classList.add('opacity-0');
            overlay.querySelector('div').classList.add('translate-y-full');
        });
    }
});

// Lazy loading for images
const imageObserver = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const img = entry.target;
            img.src = img.dataset.src;
            img.classList.remove('shimmer');
            observer.unobserve(img);
        }
    });
}, {
    rootMargin: '50px'
});

document.querySelectorAll('img[data-src]').forEach(img => {
    imageObserver.observe(img);
});

// Scroll animations
const scrollObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-fade-in-up');
        }
    });
}, {
    threshold: 0.1
});

document.querySelectorAll('.product-card, .category-header').forEach(el => {
    scrollObserver.observe(el);
});
</script>
@endsection
