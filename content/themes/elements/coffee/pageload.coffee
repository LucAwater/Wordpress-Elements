$ ->
  Pace.on 'done', ->
    $('body').removeClass "is-loading"
    
    $('.pace').remove()
    return