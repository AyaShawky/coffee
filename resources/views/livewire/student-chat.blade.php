<div>
    <div class="MessagesSection mt-5 mb-5">
        <div class="messages">
            <div class="container-fluid">
                <div class="messaging">
                    <div class="inbox_msg">
                        <div wire:poll>
                            @if($clicked_user != null)
                            <div class="mesgs">
                                <div class="msg_history">
                                    @forelse($messages as $message)
                                        @if($message->messagable instanceof \App\Teacher)
                                            <div class="incoming_msg">
                                                <div class="received_msg">
                                                    <div class="received_withd_msg">
                                                        <p class="NotoRegular p-2">{{$message->message}}</p>
                                                        <span class="time_date ArialBold">{{ $message->created_at }}</span></div>
                                                </div>
                                                <div class="incoming_msg_img">
                                                    <img src="{{asset('storage/teacher_images/'.$clicked_user->image)}}" alt="sunil">
                                                </div>
                                            </div>
                                        @else
                                            <div class="outgoing_msg">
                                                <div class="sent_msg">
                                                    <p  class="NotoRegular p-2">{{$message->message}}</p>
                                                    <span class="time_date ArialBold">{{ $message->created_at }}</span> </div>
                                            </div>
                                        @endif
                                    @empty
                                        <p>لا توجد رسائل</p>
                                    @endforelse
                                        @if(count($messages)>=10)
                                            <button style="text-align: center; margin-bottom: 1.2rem" id="showMore" class="btn btn-primary showMore" wire:click="$emit('loadMore')">تحميل المزيد</button>
                                        @endif
                                </div>
                                <div class="type_msg">
                                    <div class="input_msg_write DeleteEffects border-3">
                                        <form wire:submit.prevent="sendMessage">
                                            <input  wire:model="messageText" type="text" class="write_msg NotoRegular" placeholder="قم بالتواصل مع الأستاذ" />
                                            <button class="msg_send_btn" type="button"><i class="far fa-paper-plane" aria-hidden="true"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="inbox_people">
                            <div class="headind_srch">
                                <div class="recent_heading">
                                    <h4 class="NotoRegular">الرسائل</h4>
                                </div>
                            </div>
                            <div class="inbox_chat">
                                @foreach($teachers as $teacher)
                                    <div>
                                        <a href="" wire:click.prevent="getTeacherMessages({{ $teacher->id }})" >
                                            <div class="chat_list @if($clicked_user !=null && $clicked_user->id == $teacher->id) active_chat @endif">
                                                <div class="chat_people d-flex align-items-center">
                                                    <div class="chat_img">
                                                        <img src="{{asset('storage/teacher_images/'.$teacher->image)}}" alt="sunil">
                                                    </div>
                                                    <div class="chat_ib d-flex align-items-center">
                                                        <h5 class="NotoRegular ms-3 m-0">الأستاذ / {{$teacher->name}}</h5>
                                                    </div>
                                                    @if($teacher->messagesSent()->where('seen_at',null)->count() >0)
                                                    <button disabled="disabled" style="border-radius: 50%" class="btn btn-primary disabled">{{$teacher->messagesSent()->where('seen_at',null)->count()}}</button>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
