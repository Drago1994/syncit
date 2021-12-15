<!DOCTYPE html>
<html>
    <head>
        <title>Contact List</title>
        <script src = "https://ajax.aspnetcdn.com/ajax/knockout/knockout-3.1.0.js"
        type = "text/javascript"></script>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
        </script>

        <style>
            table, th, td {
                border: 1px solid white;
                border-collapse: collapse;
            }
            th, td {
                background-color: #ece3b7;
                padding: 10px;
            }
            a{
                color:red;
                cursor: pointer;
            }

        </style>

    </head>
    <body>
        {{-- <script type='text/javascript' src='knockout-3.5.1.js'></script> --}}
        {{-- {{ $contact['firstname'] }} {{ $contact['lastname'] }}

        <ul>
        @forelse ($contact->numbers() as $number)
            <li> {{ $number['label'] }} -> {{ $number['number'] }} </li>
        @empty
            <li>No numbers exist </li>
        @endforelse
        </ul>
 --}}



        <table  style=" border:1px solid black">
            <tr>
                <th colspan="3"><h1>Contacts</h1></th>
            </tr>
            <tr>
              <th>First name</th>
              <th>Last name</th>
              <th>Phone numbers</th>
            </tr>

            @foreach($contactList as $contact)
                <tr>
                    <td>
                        <input value={{ $contact['firstname'] }} type="text" placeholder="First name">
                    </td>
                    <td>
                        <input value={{ $contact['lastname'] }} type="text" placeholder="Last name">
                        <a style="color:red"><u>Delete</u></a>

                    </td>
                    <td>
                        @foreach($contact['numbers'] as $number)
                        <div style="padding-bottom:5px">
                            <input value={{ $number['label'] }} type="text" placeholder="Label">
                            <input value={{ $number['number'] }} type="text" placeholder="Number">
                            <a style="color:red"><u>Delete</u></a>
                            <br>
                        </div>
                        @endforeach
                        <a style="color:red"><u>Add number</u></a>
                    </td>
                </tr>
            @endforeach


            <tr>
                <th colspan="3">
                    <button data-bind="click:addContact">Add contact</button>
                    <button data-bind="click:getContacts">Save</button>
                </th>
            </tr>

        </table>







    </body>
</html>
