$ ->
  slider = $('.section-slider')
  images = $('.slider-images')
  image = $('.slider-images li')
  
  controls = $('.slider-controls')
  bullets = $('.slider-bullets')
  bullet = $('.slider-bullets li')
  
  next = $('.slider-next')
  prev = $('.slider-prev')
  
  # first image & bullet get first & active classes
  image.first().addClass "first-image first is-active"
  bullet.first().addClass "first-bullet first is-active"
  
  # last image & bullet get last class
  image.last().addClass "last-image last"
  bullet.last().addClass "last-bullet last"
  
  # lightbox functionality
  open = $('.lightbox-open')
  close = $('.lightbox-close')
  
  open.click ->
    gallery.addClass "is-zoomed"
    
  close.click ->
    gallery.removeClass "is-zoomed"
    
    # Determine heights
    gallery_width = gallery.width()
    
    # Apply heights
    gallery.css "height", gallery_width * 0.75
    $('#order').css "height", gallery_width * 0.75
    
  # next button
  next.click ->
    current = $('.is-active')
    
    if current.hasClass "last"
      target = $('.first')
    else
      target = current.next()
    
    current.removeClass "is-active"
    target.addClass "is-active"
    
  # previous button
  prev.click ->
    current = $('.is-active')
    
    if current.hasClass "first"
      target = $('.last')
    else
      target = current.prev()
    
    current.removeClass "is-active"
    target.addClass "is-active"
    
  # next image if you click on the image
  image.click ->
    current = $('.is-active')
    
    if current.hasClass "last"
      target = $('.first')
    else
      target = current.next()
    
    current.removeClass "is-active"
    target.addClass "is-active"
    
  # arrow keys
  $(window).keydown (e) ->
  	if e.which == 39 # right arrow key
    current = $('.is-active')
    
    if current.hasClass "last"
      target = $('.first')
    else
      target = current.next()
    
    current.removeClass "is-active"
    target.addClass "is-active"
  
  	if e.which == 37 # left arrow key
    current = $('.is-active')
    
    if current.hasClass "first"
      target = $('.last')
    else
      target = current.prev()
    
    current.removeClass "is-active"
    target.addClass "is-active"
  
  # swipe left for next image
  image.on "swipeleft", ->
    current = $('.is-active')
    
    if current.hasClass "last"
      target = $('.first')
    else
      target = current.next()
      
    current.removeClass "is-active"
    target.addClass "is-active"
  
  # swipe right for previous image
  image.on "swiperight", ->
    current = $('.is-active')
    
    if current.hasClass "first"
      target = $('.last')
    else
      target = current.prev()
    
    current.removeClass "is-active"
    target.addClass "is-active"
  return
    
  # Hiding bullets if there's only 1 image
  if image.length < 2
    bullets.hide()
    controls.hide()
  else
    # show them