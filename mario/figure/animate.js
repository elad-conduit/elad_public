﻿
            var animationManager = (function(window, $, undefined){
                var $container,
                    $queue,
                    animationConfig = {
                        moveFromRightToLeft: 1,
                        moveFromTopToBottom: 1,
                        blinkCount: 6
                    },
                    currentAbsPath = ((document.location).toString()).split('#')[0],
                    APP_PATH = currentAbsPath.substring(0, currentAbsPath.lastIndexOf('/')) + '/';

                function init(container) {
                    $container = $('#' + container);
                    if(!$container) {
                        return;
                    }

                    doImageCaching();

                    if($('Queue') && $queue) {
                        $queue.clearQueue('Animation');
                    }
                    else {
                        $queue = $('<div id="Queue" style="display: none;"></div>');
                        $container.append($queue);
                    }
                }

                function doImageCaching() {
                    var prefix = APP_PATH,
                        $preloadDiv = $('<div id="preloader" style="display: none;"></div>'),
                        img,
                        resources = [
                            'img/bg.png',
                            'img/big.png',
                            'img/bird.png',
                            'img/mario_big.png',
                            'img/mario_small.png',
                            'img/mario_super.png',
                            'img/mushroom.png',
                            'img/small.png',
                            'img/super.png',
                            'img/super_btn.png',
                            'img/small_btn.png',
                            'img/big_btn.png'
                        ];

                    $container.append($preloadDiv);

                    function createImg(src) {
                        var cacheImage = document.createElement('img');
                        cacheImage.src = src;
                        return cacheImage;
                    }

                    function removePreloader() {
                        $preloadDiv.remove(); //Remove all the images after they were down;paded
                    }

                    for (i = 0 ; i < resources.length ; i++) {
                        img = createImg(prefix + resources[i]);
                        if(i === resources.length-1) {
                            addEvent(img, 'load', removePreloader);
                        }
                        $preloadDiv.append(img);
                    }
                }

                function smallToBig() {
                    //setup
                    $container.css({ background: 'transparent url("img/bg.png") 0 0 no-repeat'});

                    var $smallMario = $('<img src="img/mario_small.png" alt=""/>')
                                        .css({ width: '12px',
                                               height: '17px',
                                               position: 'absolute',
                                               bottom: '2px',
                                               left: '3px'
                                        });
                    $container.append($smallMario);

                    var $smallText = $('<img src="img/small.png" alt=""/>')
                                        .css({ width: '40px',
                                               height: '19px',
                                               position: 'absolute',
                                               bottom: '2px',
                                               left: '20px'
                                        });
                    $container.append($smallText);

                    var $bigMario = $('<img src="img/mario_big.png" alt=""/>')
                                        .css({ width: '13px',
                                               height: '24px',
                                               position: 'absolute',
                                               bottom: '0px',
                                               left: '3px',
                                               display: 'none'
                                        });
                    $container.append($bigMario);

                    var $bigText = $('<img src="img/big.png" alt=""/>')
                                        .css({ width: '19px',
                                               height: '19px',
                                               position: 'absolute',
                                               bottom: '29px',
                                               left: '21px'
                                        });
                    $container.append($bigText);

                    var $mushroom = $('<img src="img/mushroom2.png" alt=""/>')
                                        .css({ width: '16px',
                                               height: '16px',
                                               position: 'absolute',
                                               bottom: '3px',
                                               left: '67px'
                                        });
                    $container.append($mushroom);

                    buildAnimation($smallMario, $smallText, $bigMario, $bigText, $mushroom, endSmallToBigAnimation);

                    //start animation
                    $queue.animate({ width: '0px' }, 1, function(){
                        $(this).dequeue('Animation')
                    });
                }

                function bigToSuper() {
                    //setup
                    $container.css({ background: 'transparent url("img/bg.png") 0 0 no-repeat'});

                    var $bigMario = $('<img src="img/mario_big.png" alt=""/>')
                                        .css({ width: '13px',
                                               height: '24px',
                                               position: 'absolute',
                                               bottom: '0px',
                                               left: '4px'
                                        });
                    $container.append($bigMario);

                    var $bigText = $('<img src="img/big.png" alt=""/>')
                                        .css({ width: '19px',
                                               height: '19px',
                                               position: 'absolute',
                                               bottom: '2px',
                                               left: '20px'
                                        });
                    $container.append($bigText);

                    var $superMario = $('<img src="img/mario_super.png" alt=""/>')
                                        .css({ width: '11px',
                                               height: '23px',
                                               position: 'absolute',
                                               bottom: '1px',
                                               left: '4px',
                                               display: 'none'
                                        });
                    $container.append($superMario);

                    var $superText = $('<img src="img/super.png" alt=""/>')
                                        .css({ width: '37px',
                                               height: '19px',
                                               position: 'absolute',
                                               bottom: '29px',
                                               left: '20px'
                                        });
                    $container.append($superText);

                    var $mushroom = $('<img src="img/mushroom.png" alt=""/>')
                                        .css({ width: '17px',
                                               height: '16px',
                                               position: 'absolute',
                                               bottom: '3px',
                                               left: '67px'
                                        });
                    $container.append($mushroom);

                    buildAnimation($bigMario, $bigText, $superMario, $superText, $mushroom, endBigToSuperAnimation);

                    //start animation
                    $queue.animate({ width: '0px' }, 1, function(){
                        $(this).dequeue('Animation')
                    });
                }

                function buildAnimation($smallerMario, $smallerText, $biggerMario, $biggerText, $mushroom, endAnimationCallback) {
                    $queue.clearQueue('Animation');

                    //set the animation
                    $queue.queue('Animation',function(next){
                        $.when(moveMushroomFromRightToLeft($mushroom)).done(function(){
                            $mushroom.remove();
                            $smallerMario.remove();
                            $biggerMario.show();
                            next();
                        });
                    });

                    $queue.queue('Animation',function(next){
                        $.when(blink($biggerMario)).done(function(){
                            endAnimationCallback();
                        });

                        next();
                    });

                    $queue.queue('Animation',function(next){
                        $.when(moveTextFromTopToBottom($biggerText, '2px'), moveTextFromTopToBottom($smallerText, '-25px')).done(function(){
                            next();
                        });
                    });
                }

                function moveMushroomFromRightToLeft($elm) {
                    var dfd = $.Deferred();
                    $elm.animate({ 'left': '3px' }, animationConfig.moveFromRightToLeft*1000, function() {
                        // Animation complete.
                        dfd.resolve();
                    });
                    return dfd.promise();
                }

                function blink($elm) {
                    var dfd = $.Deferred();
                    for (var i = 0; i < animationConfig.blinkCount; i++) {  //blink
                        $elm.animate({ opacity: 1 }, { queue: true, duration: 100 }).animate({ opacity: 0 }, { queue: true, duration: 100 });
                    }

                    $elm.animate({ opacity: 1 }, { queue: true, duration: 100,
                        complete: function () {  //when current animation cycle is complete
                            dfd.resolve();
                        }
                    });
                    return dfd.promise();
                }

                function moveTextFromTopToBottom($elm, bottomDestination) {
                    var dfd = $.Deferred();
                    $elm.animate({ 'bottom': bottomDestination }, animationConfig.moveFromTopToBottom*1000, function() {
                        // Animation complete.
                        dfd.resolve();
                    });
                    return dfd.promise();
                }

                function endSmallToBigAnimation() {
                    $container.css({ background: 'transparent url("img/big_btn.png") 0 0 no-repeat'}).empty();
                }

                function endBigToSuperAnimation() {
                    $container.css({ background: 'transparent url("img/super_btn.png") 0 0 no-repeat'}).empty();
                }

                function addEvent () {
                    if (document.addEventListener) {
                        return function (el, type, fn) {
                            if (el && el.nodeName || el === window) {
                                el.addEventListener(type, fn, false);
                            } else if (el && el.length) {
                                for (var i = 0; i < el.length; i++) {
                                    addEvent(el[i], type, fn);
                                }
                            }
                        };
                    } else {
                        return function (el, type, fn) {
                            if (el && el.nodeName || el === window) {
                                el.attachEvent('on' + type, function () { return fn.call(el, window.event); });
                            } else if (el && el.length) {
                                for (var i = 0; i < el.length; i++) {
                                    addEvent(el[i], type, fn);
                                }
                            }
                        };
                    }
                }

                return {
                    init: init,
                    smallToBig: smallToBig,
                    bigToSuper: bigToSuper
                }
            }(window, jQuery));

