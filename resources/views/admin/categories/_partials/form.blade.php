              @csrf
               <div class="form-group">
                  <input type="text" name="title" class="form-control" placeholder="Titulo" value="{{$category->title ?? old('title')}}">
               </div>

               <div class="form-group">
                <input type="text" name="url" class="form-control" placeholder="URL" value="{{$category->url ?? old('url')}}">
             </div>

             <div class="form-group">
                <textarea name="description" class="form-control" placeholder="descripton" cols="30" rows="7" value="{{$category->description ?? old('description')}}">
                </textarea>    
             </div>
             <div>
                <button type="submit" class="btn btn-success">Enviar</button>
             </div>