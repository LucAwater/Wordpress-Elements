$ ->
  object = $('.has-anchor')
  link = $('nav ul li')
  
  waypoints = object.waypoint((direction) ->
    link.removeClass "current"
    count = object.index(this.element) + 1
    $('nav ul li:nth-child(' + count + ')').addClass "current"
  )
  #
  # waypoints = anchor_last.waypoint(((direction) ->
  #   $('section').removeClass "anchor-current"
  #   $(this.element).addClass "anchor-current"
  # ), offset: 'bottom-in-view')