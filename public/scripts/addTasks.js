// setup an "add a tag" link
var $addTaskLink = $('<a href="#" class="btn btn-primary add_task_link">Voeg een taak toe</a>');
var $newLinkLi = $('<li></li>').append($addTaskLink);

jQuery(document).ready(function() {

    $collectionHolder = $('ul.tasks');

    $collectionHolder.append($newLinkLi);

    $collectionHolder.find('li').each(function() {
        addTaskFormDeleteLink($(this));
    });
    
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addTaskLink.on('click', function(e) {
        e.preventDefault();
        addTaskForm($collectionHolder, $newLinkLi);
    });
});

function addTaskForm($collectionHolder, $newLinkLi) {

    var prototype = $collectionHolder.data('prototype');
    
    var index = $collectionHolder.data('index');

    var newForm = prototype;

    // // You need this only if you didn't set 'label' => false in your tags field in TaskType
    // // Replace '__name__label__' in the prototype's HTML to
    // // instead be a number based on how many items we have
    // // newForm = newForm.replace(/__name__label__/g, index);

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    newForm = newForm.replace(/__name__/g, index);

    $collectionHolder.data('index', index + 1);

    var $newFormLi = $('<li></li>').append(newForm);

    $newLinkLi.before($newFormLi);

    addTaskFormDeleteLink($newFormLi);
}

function addTaskFormDeleteLink($taskFormLi) {
    var $removeFormButton = $('<a href="#" class="remove-tag">X</a>');

    $taskFormLi.append($removeFormButton);

    $removeFormButton.on('click', function(e) {
        $taskFormLi.remove();
    });
}