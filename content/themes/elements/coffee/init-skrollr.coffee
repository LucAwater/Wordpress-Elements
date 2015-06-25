if $('.parallax').length > 0
  (($) ->
    # Init Skrollr
    s = skrollr.init(render: (data) ->
      #Debugging - Log the current scroll position.
      #console.log(data.curTop);
      return
    )
    return
  ) jQuery