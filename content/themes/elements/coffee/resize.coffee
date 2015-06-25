body = $('body')
resizeTimer = undefined

$(window).resize ->
  body.addClass "is-loading"

$(window).on 'resize', (e) ->
  clearTimeout resizeTimer
  
  resizeTimer = setTimeout((->
    body.removeClass "is-loading"
    return
  ), 500)
  return