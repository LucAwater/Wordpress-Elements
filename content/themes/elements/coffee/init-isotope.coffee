if $('.isotope').length > 0
  masonry = $('.isotope-masonry')
  
  $('main').imagesLoaded(->
    masonry.isotope {
      layoutMode: 'masonry'
    }
    return
  )