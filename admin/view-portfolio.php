<?php 
  @include 'includes/header.php';
?>
<link rel="stylesheet" href="css/tagify.css">
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">View Portfolio</h4>
                     <div id="response-msg"></div>
                  <!-- items -->
                  <div class="inline-content inline-area" id="view_portfolio">

                   <!--  <div class="col-md-12">
                      <div class="project-blog project-blogs">
                        <div class="img-pro">
                          <img src="images/projects/img-01.jpg" alt="Porject 1" class="img-fluid">
                        </div>
                        <div class="right">
                          <ul class="inline-list">
                            <li>Prototyping</li>
                            <li>Colorado Media Project</li>
                          </ul>
                          <div class="title">
                              <h2><span>We bridge the gap between</span> <span>mentorship and mentees</span>
                            </h2>
                          </div>
                        </div>
                          <div class="button-group btn-groups">
                            <button class="btn btn-green btn-block btn-rounded" data-toggle="modal" data-target="#editModal">Edit</button>
                            <button class="btn btn-blue btn-block btn-rounded" data-toggle="confirmation" data-title="Are you Sure Active?">Active</button>
                          </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="project-blog project-blogs">
                        <div class="img-pro">
                          <img src="images/projects/img-02.jpg" alt="Porject 1" class="img-fluid">
                        </div>
                        <div class="right">
                          <ul class="inline-list">
                            <li>Prototyping</li>
                            <li>Colorado Media Project</li>
                          </ul>
                          <div class="title">
                              <h2><span>We bridge the gap between</span> <span>mentorship and mentees</span>
                            </h2>
                          </div>
                        </div>
                          <div class="button-group btn-groups">
                            <button class="btn btn-green btn-block btn-rounded" data-toggle="modal" data-target="#editModal">Edit</button>
                            <button class="btn btn-disable btn-block btn-rounded" data-toggle="confirmation" data-title="Are you Sure Disable?">Disable</button>
                          </div>
                      </div>
                    </div> -->
                  </div>
                  <!-- //items -->



                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        
<?php 
  include 'includes/footer.php';
?>


<script>
  $('[data-toggle=confirmation]').confirmation({
    rootSelector: '[data-toggle=confirmation]',
    // other options
  });
</script>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="editModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog edit_dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8">
          <form class="forms-sample">
            <div id="response-msg1"></div>
            <input type="hidden" name="edit_id" id="edit_id">
            <input type="hidden" name="img" id="img">
             <div id="blog_tags">
              <div class="tag-items" id="tagItems">
                Tag1 <span class="close tag-hide" onclick="tagHide()">x</span>
              </div>
              <div class="tag-items">
                Tag1 <span class="close tag-hide">x</span>
              </div>

            </div>
            <div class="form-group">
              <label for="tags_field">Write Some Tags</label>
              <input type="text" name="tags" id="edit_tags" class="form-control" value="" required="">
            </div>
            <div class="form-group">
              <label for="exampleInputTitle1">Bold Title</label>
              <textarea name=""  id="edit_bold_title" maxlength="160" minlength="160" id="" cols="30" rows="4" class="form-control" required=""></textarea>
            </div>
            <div class="text-left">
              <button type="button" class="btn btn-purple btn-rounded mr-2 update_portfolio">Submit</button>
            </div>
          </form>
        </div>

        <div class="col-md-4">
          <div class="card-body text-center">
            <img src="images/images.png" id="image-add" alt="" class="img-fluid upload_image">
            <div class="file-upload">
              <input type="hidden" name="" id="user_img">
                <label for="upload" class="file-upload__label">Upload Image</label>
                <input id="upload" class="file-upload__input" type="file" name="file-upload">
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>



  <script src="js/jquery-3.3.1.js">  </script>
  <script src="js/view-portfolio.js"></script>
  <script src="js/tagify.js"></script>
<script>
  var input1 = document.querySelector('input[name=tags]')
    // input2 = document.querySelector('textarea[name=tags2]'),
    // init Tagify script on the above inputs
    tagify1 = new Tagify(input1, {
        whitelist : ["A# .NET", "A# (Axiom)", "A-0 System", "A+", "A++", "ABAP", "ABC", "ABC ALGOL", "ABSET", "ABSYS", "ACC", "Accent", "Ace DASL", "ACL2", "Avicsoft", "ACT-III", "Action!", "ActionScript", "Ada", "Adenine", "Agda", "Agilent VEE", "Agora", "AIMMS", "Alef", "ALF", "ALGOL 58", "ALGOL 60", "ALGOL 68", "ALGOL W", "Alice", "Alma-0", "AmbientTalk", "Amiga E", "AMOS", "AMPL", "Apex (Salesforce.com)", "APL", "AppleScript", "Arc", "ARexx", "Argus", "AspectJ", "Assembly language", "ATS", "Ateji PX", "AutoHotkey", "Autocoder", "AutoIt", "AutoLISP / Visual LISP", "Averest", "AWK", "Axum", "Active Server Pages", "ASP.NET", "B", "Babbage", "Bash", "BASIC", "bc", "BCPL", "BeanShell", "Batch (Windows/Dos)", "Bertrand", "BETA", "Bigwig", "Bistro", "BitC", "BLISS", "Blockly", "BlooP", "Blue", "Boo", "Boomerang", "Bourne shell (including bash and ksh)", "BREW", "BPEL", "B", "C--", "C++ – ISO/IEC 14882", "C# – ISO/IEC 23270", "C/AL", "Caché ObjectScript", "C Shell", "Caml", "Cayenne", "CDuce", "Cecil", "Cesil", "Céu", "Ceylon", "CFEngine", "CFML", "Cg", "Ch", "Chapel", "Charity", "Charm", "Chef", "CHILL", "CHIP-8", "chomski", "ChucK", "CICS", "Cilk", "Citrine (programming language)", "CL (IBM)", "Claire", "Clarion", "Clean", "Clipper", "CLIPS", "CLIST", "Clojure", "CLU", "CMS-2", "COBOL – ISO/IEC 1989", "CobolScript – COBOL Scripting language", "Cobra", "CODE", "CoffeeScript", "ColdFusion", "COMAL", "Combined Programming Language (CPL)", "COMIT", "Common Intermediate Language (CIL)", "Common Lisp (also known as CL)", "COMPASS", "Component Pascal", "Constraint Handling Rules (CHR)", "COMTRAN", "Converge", "Cool", "Coq", "Coral 66", "Corn", "CorVision", "COWSEL", "CPL", "CPL", "Cryptol", "csh", "Csound", "CSP", "CUDA", "Curl", "Curry", "Cybil", "Cyclone", "Cython", "M2001", "M4", "M#", "Machine code", "MAD (Michigan Algorithm Decoder)", "MAD/I", "Magik", "Magma", "make", "Maple", "MAPPER now part of BIS", "MARK-IV now VISION:BUILDER", "Mary", "MASM Microsoft Assembly x86", "MATH-MATIC", "Mathematica", "MATLAB", "Maxima (see also Macsyma)", "Max (Max Msp – Graphical Programming Environment)", "MaxScript internal language 3D Studio Max", "Maya (MEL)", "MDL", "Mercury", "Mesa", "Metafont", "Microcode", "MicroScript", "MIIS", "Milk (programming language)", "MIMIC", "Mirah", "Miranda", "MIVA Script", "ML", "Model 204", "Modelica", "Modula", "Modula-2", "Modula-3", "Mohol", "MOO", "Mortran", "Mouse", "MPD", "Mathcad", "MSIL – deprecated name for CIL", "MSL", "MUMPS", "Mystic Programming L"],
        blacklist : ["fuck", "shit"]
}),
// tagify2 = new Tagify(input2, {
//     enforeWhitelist : true,
//     whitelist       : ["The Shawshank Redemption", "The Godfather", "The Godfather: Part II", "The Dark Knight", "12 Angry Men", "Schindler's List", "Pulp Fiction", "The Lord of the Rings: The Return of the King", "The Good, the Bad and the Ugly", "Fight Club", "The Lord of the Rings: The Fellowship of the Ring", "Star Wars: Episode V - The Empire Strikes Back", "Forrest Gump", "Inception", "The Lord of the Rings: The Two Towers", "One Flew Over the Cuckoo's Nest", "Goodfellas", "The Matrix", "Seven Samurai", "Star Wars: Episode IV - A New Hope", "City of God", "Se7en", "The Silence of the Lambs", "It's a Wonderful Life", "The Usual Suspects", "Life Is Beautiful", "Léon: The Professional", "Spirited Away", "Saving Private Ryan", "La La Land", "Once Upon a Time in the West", "American History X", "Interstellar", "Casablanca", "Psycho", "City Lights", "The Green Mile", "Raiders of the Lost Ark", "The Intouchables", "Modern Times", "Rear Window", "The Pianist", "The Departed", "Terminator 2: Judgment Day", "Back to the Future", "Whiplash", "Gladiator", "Memento", "Apocalypse Now", "The Prestige", "The Lion King", "Alien", "Dr. Strangelove or: How I Learned to Stop Worrying and Love the Bomb", "Sunset Boulevard", "The Great Dictator", "Cinema Paradiso", "The Lives of Others", "Paths of Glory", "Grave of the Fireflies", "Django Unchained", "The Shining", "WALL·E", "American Beauty", "The Dark Knight Rises", "Princess Mononoke", "Aliens", "Oldboy", "Once Upon a Time in America", "Citizen Kane", "Das Boot", "Witness for the Prosecution", "North by Northwest", "Vertigo", "Star Wars: Episode VI - Return of the Jedi", "Reservoir Dogs", "M", "Braveheart", "Amélie", "Requiem for a Dream", "A Clockwork Orange", "Taxi Driver", "Lawrence of Arabia", "Like Stars on Earth", "Double Indemnity", "To Kill a Mockingbird", "Eternal Sunshine of the Spotless Mind", "Toy Story 3", "Amadeus", "My Father and My Son", "Full Metal Jacket", "The Sting", "2001: A Space Odyssey", "Singin' in the Rain", "Bicycle Thieves", "Toy Story", "Dangal", "The Kid", "Inglourious Basterds", "Snatch", "Monty Python and the Holy Grail", "Hacksaw Ridge", "3 Idiots", "L.A. Confidential", "For a Few Dollars More", "Scarface", "Rashomon", "The Apartment", "The Hunt", "Good Will Hunting", "Indiana Jones and the Last Crusade", "A Separation", "Metropolis", "Yojimbo", "All About Eve", "Batman Begins", "Up", "Some Like It Hot", "The Treasure of the Sierra Madre", "Unforgiven", "Downfall", "Raging Bull", "The Third Man", "Die Hard", "Children of Heaven", "The Great Escape", "Heat", "Chinatown", "Inside Out", "Pan's Labyrinth", "Ikiru", "My Neighbor Totoro", "On the Waterfront", "Room", "Ran", "The Gold Rush", "The Secret in Their Eyes", "The Bridge on the River Kwai", "Blade Runner", "Mr. Smith Goes to Washington", "The Seventh Seal", "Howl's Moving Castle", "Lock, Stock and Two Smoking Barrels", "Judgment at Nuremberg", "Casino", "The Bandit", "Incendies", "A Beautiful Mind", "A Wednesday", "The General", "The Elephant Man", "Wild Strawberries", "Arrival", "V for Vendetta", "Warrior", "The Wolf of Wall Street", "Manchester by the Sea", "Sunrise", "The Passion of Joan of Arc", "Gran Torino", "Rang De Basanti", "Trainspotting", "Dial M for Murder", "The Big Lebowski", "The Deer Hunter", "Tokyo Story", "Gone with the Wind", "Fargo", "Finding Nemo", "The Sixth Sense", "The Thing", "Hera Pheri", "Cool Hand Luke", "Andaz Apna Apna", "Rebecca", "No Country for Old Men", "How to Train Your Dragon", "Munna Bhai M.B.B.S.", "Sholay", "Kill Bill: Vol. 1", "Into the Wild", "Mary and Max", "Gone Girl", "There Will Be Blood", "Come and See", "It Happened One Night", "Life of Brian", "Rush", "Hotel Rwanda", "Platoon", "Shutter Island", "Network", "The Wages of Fear", "Stand by Me", "Wild Tales", "In the Name of the Father", "Spotlight", "Star Wars: The Force Awakens", "The Nights of Cabiria", "The 400 Blows", "Butch Cassidy and the Sundance Kid", "Mad Max: Fury Road", "The Maltese Falcon", "12 Years a Slave", "Ben-Hur", "The Grand Budapest Hotel", "Persona", "Million Dollar Baby", "Amores Perros", "Jurassic Park", "The Princess Bride", "Hachi: A Dog's Tale", "Memories of Murder", "Stalker", "Nausicaä of the Valley of the Wind", "Drishyam", "The Truman Show", "The Grapes of Wrath", "Before Sunrise", "Touch of Evil", "Annie Hall", "The Message", "Rocky", "Gandhi", "Harry Potter and the Deathly Hallows: Part 2", "The Bourne Ultimatum", "Diabolique", "Donnie Darko", "Monsters, Inc.", "Prisoners", "8½", "The Terminator", "The Wizard of Oz", "Catch Me If You Can", "Groundhog Day", "Twelve Monkeys", "Zootopia", "La Haine", "Barry Lyndon", "Jaws", "The Best Years of Our Lives", "Infernal Affairs", "Udaan", "The Battle of Algiers", "Strangers on a Train", "Dog Day Afternoon", "Sin City", "Kind Hearts and Coronets", "Gangs of Wasseypur", "The Help"]
// });

// toggle Tagify on/off
document.querySelector('input[type=checkbox]').addEventListener('change', function(){
    document.body.classList[this.checked ? 'add' : 'remove']('disabled');
});


// $(document).ready(function() {
//   $('.tag-hide').click(function() {
//     // $('.tag-items').hide();
//     alert("Hide tag");
//   });
// });

function tagHide() {
  $('#tagItems').hide();
}
</script>
