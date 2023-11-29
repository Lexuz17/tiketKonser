<div class="card-event rounded-3 bg-white overflow-hidden swiper-slide shadow">
    <div class="card-event-thumbnail">
        <a href="" class="position-absolute w-100 h-100 top-0 start-0"></a>
        <img src="{{ $image }}" alt="{{ $title }}" class="w-100">
    </div>
    <div class="card-event-description p-3">
        <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>
        <div class="description-title">{{ $title }}</div>
        <div class="description-date text-gray-3 py-1">{{ $date }}</div>
        <div class="description-price">
            <span class="final-price fw-bold">{{ $price }}</span>
        </div>
    </div>
    <div class="card-event-creator px-3 py-2">
        <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>
        <div class="d-grid gap-2">
            <div class="d-flex align-items-center">
                <div class="creator-avatar me-3 rounded-circle overflow-hidden">
                    <img src="{{ $creatorImage }}" width="32px" height="32px" alt="{{ $creatorName }}" class="">
                </div>
                <div class="creator-name text-uppercase text-gray-4 fs-label">{{ $creatorName }}</div>
            </div>
        </div>
    </div>
</div>
