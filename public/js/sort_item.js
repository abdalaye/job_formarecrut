//Sortable JS
Sortable.create(simpleList, {
    animation: 300,
    ghostClass: "list-group-item-success", // Class name for the drop placeholder
    // Element dragging ended
    onEnd: function( /**Event*/ evt) {
        let old_index = evt.oldIndex; // element's old index within old parent
        let new_index = evt.newIndex; // element's new index within new parent
        let old_draggable_index = evt
            .oldDraggableIndex; // element's old index within old parent, only counting draggable elements
        //console.log(evt.newDraggableIndex); // element's new index within new parent, only counting draggable elements

        let taille = $('#simpleList .list-group-item').length;

        for (var i = 0; i < taille; i++) {
            let item = $('#simpleList .list-group-item')[i];
            $(item).attr('id', 'elt' + i);
            $('#champs' + $(item).data('id')).val(i);
        }

        //console.log(evt.clone); // the clone element
        //console.log(evt.pullMode);  // when item is in another sortable: `"clone"` if cloning, `true` if moving
    },
});
