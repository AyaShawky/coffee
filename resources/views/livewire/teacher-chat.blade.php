<div>
   <div class="col-md-4">
   {{--   <form action="{{route('dashboard.teachers.course',$course->id)}}" method="GET" style="margin-bottom: 1.2rem;">--}}
   {{--      <div class="input-group">--}}
   {{--         <input type="text" name="search" value="{{request()->search}}" class="form-control" placeholder="بحث ...">--}}
   {{--         <span class="input-group-btn">--}}
   {{--                                            <button class="btn btn-primary" type="submit"> بحث <i class="fa fa-search"></i></button>--}}
   {{--                                        </span>--}}
   {{--      </div>--}}
   {{--   </form>--}}

      <div class="list-group">
         @foreach($users as $user)
            <a class="list-group-item list-group-item-action @if($clicked_user !=null) @if($clicked_user->id == $user->id) active @endif @endif" wire:click="getUserMessages({{ $user->id }})" >@if($user->messagesSent()->where('teacher_id',auth('teacher')->user()->id)->where('seen_at',null)->count()>0)<strong>{{$user->name}}</strong>@else {{$user->name}} @endif  @if($user->messagesSent()->where('teacher_id',auth('teacher')->user()->id)->where('seen_at',null)->count()>0) <span class="badge badge-warning badge-pill">{{$user->messagesSent()->where('seen_at',null)->count()}}</span>@endif</a>
         @endforeach
      </div>
   </div>

   <div wire:poll>
      @if($clicked_user != null)
         <div class="col-md-8">
         <div class="message-box" id="messageBox">
         @forelse($messages as $message)
            <div class="single-message @if($message->messagable instanceof \App\User)received @else sent @endif">
               @if($message->messagable instanceof \App\User)
                  <p class="font-weight-bolder my-0"><strong>{{$clicked_user->name}}</strong></p>
               @endif
               <p class="my-0">
                  {{$message->message}}
               </p>
               <small class="w-100"> <em>{{ $message->created_at }}</em></small>
            </div>
         @empty
            <p>لا توجد رسائل</p>
         @endforelse
             @if(count($messages)>=10)
            <button style="text-align: center; margin-bottom: 1.2rem" id="showMore" class="btn btn-primary showMore" wire:click="$emit('loadMore')">تحميل المزيد</button>
            @endif
         </div>

         <div class="">
            <div class="row" style="margin-top: 1.2rem;">
               <form wire:submit.prevent="sendMessage">
                  <div class="col-md-10">
                     <input wire:model="messageText" type="text" class="form-control input shadow-none w-100 d-inline-block" placeholder="ارسل رسالة">
                  </div>
                  <div class="col-md-2">
                     <button class="btn btn-primary d-inline-block w-100"> ارسال <i class="fa fa-send"></i></button>
                  </div>
               </form>
            </div>
         </div>
      </div>
      @endif
   </div>
</div>
