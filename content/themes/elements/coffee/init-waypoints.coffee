$ ->
  object = $('.has-anchor')
  object_last = object.last()
  link = $('nav ul li')

  waypoints = object.waypoint((direction) ->
    link.removeClass "current"
    count = object.index(this.element) + 1
    $('nav ul li:nth-child(' + count + ')').addClass "current"
  )
  
  waypoints = object_last.waypoint(((direction) ->
    link.removeClass "current"
    count = object.index(this.element) + 1
    $('nav ul li:nth-child(' + count + ')').toggleClass "current"
  ), offset: 'bottom-in-view')
