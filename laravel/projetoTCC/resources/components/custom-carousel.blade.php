<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>carrosseul</title>
</head>
<body>

<div class="swiper custom-swiper w-full max-w-4xl mx-auto rounded-lg overflow-hidden shadow-lg">
  <div class="swiper-wrapper">
    @foreach ($slides as $slide)
      <div class="swiper-slide">
        <img src="{{ asset($slide['image']) }}" alt="Slide" class="w-full h-64 object-cover">
      </div>
    @endforeach
  </div>

  <div class="swiper-pagination"></div>
  <div class="swiper-button-prev text-black"></div>
  <div class="swiper-button-next text-black"></div>
</div>
</body>
</html>