$ ->
  object = $('.has-anchor')
  object_last = object.last()
  link = $('nav ul li')

  waypoints = object.waypoint((direction) ->
    if direction is "down"
      link.removeClass "current"
      count = object.index(this.element) + 1
      $('nav ul li:nth-child(' + count + ')').addClass "current"
    else
      count = object.index(this.element) + 1
      $('nav ul li:nth-child(' + count + ')').removeClass "current"
  )

  waypoints = object.waypoint(((direction) ->
    if direction is "down"
      link.removeClass "current"
      count = object.index(this.element) + 1
      $('nav ul li:nth-child(' + count + ')').removeClass "current"
    else
      link.removeClass "current"
      count = object.index(this.element) + 1
      $('nav ul li:nth-child(' + count + ')').addClass "current"
  ), offset: '-100%')

  waypoints = object_last.waypoint(((direction) ->
    link.removeClass "current"
    count = object.index(this.element) + 1
    $('nav ul li:nth-child(' + count + ')').toggleClass "current"
  ), offset: 'bottom-in-view')
