<!DOCTYPE html>
<html>
    <head>
        <title>Contact List</title>
        <script src = "https://ajax.aspnetcdn.com/ajax/knockout/knockout-3.1.0.js"
        type = "text/javascript"></script>
    </head>
    <body>
        {{-- <script type='text/javascript' src='knockout-3.5.1.js'></script> --}}
        {{ $contact['firstname'] }} {{ $contact['lastname'] }}

        <ul>
        @forelse ($contact->numbers()->get() as $number)
            <li> {{ $number['label'] }} -> {{ $number['number'] }} </li>
        @empty
            <li>No numbers exist </li>
        @endforelse
        </ul>

        <br>
        <input data-bind = "value: firstname" placeholder="firstname"/>
        <input data-bind = "value: lastname" placeholder="firstname"/>
        <br>
        <p data-bind = "text: thirdString"></p>

        <script>

            function AppViewModel() {
               this.firstname = ko.observable("");
               this.lastname = ko.observable("");

               this.thirdString = ko.computed(function() {
                  return this.firstname() + " " + this.lastname();
               }, this);
            }

            // Activates knockout.js
            ko.applyBindings(new AppViewModel());
         </script>

    </body>
</html>
