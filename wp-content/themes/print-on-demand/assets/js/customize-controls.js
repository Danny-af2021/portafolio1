( function( api ) {

	// Extends our custom "print-on-demand" section.
	api.sectionConstructor['print-on-demand'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );