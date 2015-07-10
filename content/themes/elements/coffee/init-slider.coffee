Pace.on 'done', ->
  slider = $('.slider')
  slider2 = $('#anchor-5')

  slider.slider()

  slider2.slider
    click: false,
    buttons: false
