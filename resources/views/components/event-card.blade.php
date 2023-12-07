<div class="card-event rounded-3 bg-white overflow-hidden swiper-slide shadow" data-location="{{ $location }}" style="display: block;">
    <div class="card-event-thumbnail position-relative">
        <a href="/event/{{ rtrim(str_replace(' ', '-', $title), '.') }}" class="position-absolute w-100 h-100 top-0 start-0" target="blank"></a>
        <img src="{{ $image }}" alt="{{ $title }}" class="w-100">
    </div>
    <div class="card-event-description p-3 position-relative">
        <a href="/event/{{ rtrim(str_replace(' ', '-', $title), '.') }}" class="position-absolute w-100 h-100 top-0 start-0" target="blank"></a>
        <div class="description-title">{{ $title }}</div>
        <div class="description-date text-gray-3 fs-label py-1">{{ date('d F Y', strtotime($date)) }}</div>
        <div class="description-price">
            <span class="final-price fw-bold fs-7">{{ $price }}</span>
        </div>
    </div>
    <div class="card-event-creator px-3 py-2 position-relative">
        <a href="#" class="position-absolute w-100 h-100 top-0 start-0"></a>
        <div class="d-grid gap-2">
            <div class="d-flex align-items-center">
                <div class="creator-avatar me-3 rounded-circle overflow-hidden">
                    <img src="{{ $creatorImage }}" width="32px" height="32px" alt="{{ $creatorName }}" class="">
                </div>
                <div class="creator-name text-uppercase text-gray-4 fs-label overflow-hidden">
                    {{ strlen($creatorName) > 18 ? substr($creatorName, 0, 18) . '...' : $creatorName }}
                </div>
            </div>
        </div>
    </div>
</div>
