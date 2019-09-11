jQuery(document).ready(function($) {

    document.querySelector('#proposal-gallery').appendChild(JGallery.create([
    {
        title: 'The Proposal Photos',
        items: [
            {
                url: image_dir + '/2-min.jpg',
                thumbUrl: image_dir + '/2-min.jpg',
                title: 'The Memorabilia',
                hash: 'photo-2'
            },   
            {
                url: image_dir + '/1-min.jpg',
                thumbUrl: image_dir + '/1-min.jpg',
                title: 'The Setup',
                hash: 'photo-1'
            },              
            {
                url: image_dir + '/3-min.jpg',
                thumbUrl: image_dir + '/3-min.jpg',
                title: 'The Reaction',
                hash: 'photo-3'
            },
                    
            {
                url: image_dir + '/6-min.jpg',
                thumbUrl: image_dir + '/6-min.jpg',
                title: 'The Proposal',
                hash: 'photo-6'
            },         
           
            {
                url: image_dir + '/4-min.jpg',
                thumbUrl: image_dir + '/4-min.jpg',
                title: 'The Booger',
                hash: 'photo-4'
            },              
            {
                url: image_dir + '/5-min.jpg',
                thumbUrl: image_dir + '/5-min.jpg',
                title: 'The Pray Over',
                hash: 'photo-5'
            },
            {
                url: image_dir + '/7-min.jpg',
                thumbUrl: image_dir + '/7-min.jpg',
                title: 'The MFI Friends',
                hash: 'photo-7'
            },        
            {
                url: image_dir + '/8-min.jpg',
                thumbUrl: image_dir + '/8-min.jpg',
                title: 'The Actresses',
                hash: 'photo-8'
            },            
            {
                url: image_dir + '/9-min.jpg',
                thumbUrl: image_dir + '/9-min.jpg',
                title: 'The JSOScc Tech Team',
                hash: 'photo-9'
            },
            {
                url: image_dir + '/10-min.jpg',
                thumbUrl: image_dir + '/10-min.jpg',
                title: 'The JSOScc Girls',
                hash: 'photo-10'
            },            
            {
                url: image_dir + '/11-min.jpg',
                thumbUrl: image_dir + '/11-min.jpg',
                title: 'The Engaged Couple',
                hash: 'photo-11'
            },            
            {
                url: image_dir + '/13-min.jpg',
                thumbUrl: image_dir + '/13-min.jpg',
                title: 'The Family - Han',
                hash: 'photo-13'
            },            
            {
                url: image_dir + '/14-min.jpg',
                thumbUrl: image_dir + '/14-min.jpg',
                title: 'The JSOScc Friends',
                hash: 'photo-14'
            },
            {
                url: image_dir + '/15-min.jpg',
                thumbUrl: image_dir + '/15-min.jpg',
                title: 'Swapoolabs Represents X Kelvin Couple',
                hash: 'photo-15'
            },            
            {
                url: image_dir + '/17-min.jpg',
                thumbUrl: image_dir + '/17-min.jpg',
                title: 'The Staff - Thanks Guys',
                hash: 'photo-17'
            },
        ]
    },
    {
        title: 'The Proposal Videos',
        items: [
            {
                element: JGallery.createElement('<video src="https://youtu.be/d4scSnLVXpI" autoplay/>'),
                thumbElement: JGallery.createElement('<span>Theme Song</span>'),
                title: 'Hannah - Original Proposal Song',
                hash: 'hannah-original-song'
            },
            {
                element: JGallery.createElement('<video src="https://youtu.be/FVRRMcBJ2P8" autoplay/>'),
                thumbElement: JGallery.createElement('<span>Love Story</span>'),
                title: 'The Love Story Summary',
                hash: 'han-love-story-summary'
            },            
            {
                element: JGallery.createElement('<video src="https://youtu.be/Mh9iry_OrGM" autoplay/>'),
                thumbElement: JGallery.createElement("<span>Rehearsal</span>"),
                title: "The Fake Waiters' Dance Rehearsal",
                hash: 'fake-waiters'
            },
             {
                element: JGallery.createElement('<video src="https://youtu.be/mHggPNBBoTU" autoplay/>'),
                thumbElement: JGallery.createElement('<span>Entrance</span>'),
                title: 'Han - The Entrance',
                hash: 'han-the-entrance'
            },            
            {
                element: JGallery.createElement('<video src="https://youtu.be/ESeZA41zmGM" autoplay/>'),
                thumbElement: JGallery.createElement('<span>Expression</span>'),
                title: 'Han - The Expression',
                hash: 'han-the-expression'
            },          
             {
                element: JGallery.createElement('<video src="https://youtu.be/gq693Hf9Zhc" autoplay/>'),
                thumbElement: JGallery.createElement('<span>Ring</span>'),
                title: 'Han - The Ring',
                hash: 'han-the-ring'
            },                            
            {
                element: JGallery.createElement('<video src="https://youtu.be/7HTe7giECB8" autoplay/>'),
                thumbElement: JGallery.createElement('<span>Proposal</span>'),
                title: 'Sed - The Proposal',
                hash: 'han-the-proposal'
            },             
        ]   
    },
    ],
    {
        "autoStartAtAlbum": 1,
        "autoStartAtItem": 1,
        "browserHistory": true,
        "slideShow": true,
        "slideShowAutoStart": true,
        "slideShowInterval": 1500,
        "thumbnails": false,
        // "thumbnailsPosition": 'right'
    }
    ).getElement());
 });