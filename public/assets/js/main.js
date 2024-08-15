var splide = new Splide('.splide', {
    type: 'loop',
    perPage: 5,
    perMove: 1,
    gap: 30,
    breakpoints: {
       '1024': {
          perPage: 3,
          perMove: 1,
          gap: 30
       },
       '768': {
          perPage: 2,
          perMove: 1,
          gap: 30
       },
       '576': {
          perPage: 1,
          perMove: 1,
          gap: 30
       } 
    }
 });

 splide.mount();