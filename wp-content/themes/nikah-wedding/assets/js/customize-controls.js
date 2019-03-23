( function( api ) {

	// Extends our custom "nikah-wedding" section.
	api.sectionConstructor['nikah-wedding'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );