<div class="category-item swiper-slide position-relative overflow-hidden rounded-2" style="background-color: {{ $backgroundColor }}">
    <a href="/discover?event={{ $categoryName }}" class="position-absolute w-100 h-100 top-0 start-0"></a>
    <div class="category-img end-0 bottom-0">
        <img src="{{ $image }}" alt="" class="object-fit-cover">
    </div>
    <div class="category-label text-white fw-bold p-2">
        {{ $categoryName }}
    </div>
</div>
